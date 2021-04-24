<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;
use App\Models\Balance;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use PDF;

class Billing extends Controller
{
    function __construct() {
      
    }

    function index() {
        $user = Auth::user();
        $invoices = $user->invoices;
        return view('billing.index', [ "invoices" => $invoices ]);
    }

    public function makePayment(Request $request)
    {
        $user = Auth::user();
        $currency = DB::table('currencies')->where('name', 'EUR')->get();
        $balances = Balance::where(['user_id' => $user->id, 'currency_id' => $currency[0]->id])->get();
        $newBalance = null;
        if(!count($balances)) {
            $newBalance = Balance::create([
                "user_id" => $user->id,
                "currency_id" => $currency[0]->id,
                "amount" => $request->amount
            ]);
        } else {
            $newBalance = Balance::where(['user_id' => $user->id, 'currency_id' => $currency[0]->id])
                ->update(['amount' => $request->amount+$balances[0]->amount]);
        }
        
        $transactionBalance = 0;
        if( $newBalance != "1" ) {
            $transactionBalance = $newBalance->amount;
        } else {
            $transactionBalance = $request->amount+$balances[0]->amount;
        }

        $transaction = Transaction::create([
            "amount"=> $request->amount,
            "receiver_id"=> $user->id,
            "type"=> "add_fund",
            "balance" => $transactionBalance
        ]);
       
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $result = Stripe\Charge::create ([
                "amount" => $request->amount,
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => $request->description 
        ]);
        
        Invoice::create([
            "user_id" => $user->id,
            "card_id" => $result->id,
            "amount" => $request->amount,
            "description" => $request->description,
            "transaction" => false
        ]);

        return back()->with('success', 'Payment successfully made.');
    }

    public function createInvoicePdf(Request $request, $id) {
      
      $user = Auth::user();
      $invoice = Invoice::where('id',  $id)->get();
      $pdf = PDF::loadView('billing.invoice', 
                ['amount' => $invoice[0]->amount, 
                 'type'=> $invoice[0]->transaction, 
                 "card_id" => $invoice[0]->card_id,
                 "create_at" => $invoice[0]->created_at,
                 "customer" =>  $user             
                ]);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');

    }
}
