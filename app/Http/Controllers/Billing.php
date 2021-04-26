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
use App\Models\Card;

class Billing extends Controller
{
    function __construct() {
      
    }

    function index() {
        $user = Auth::user();
        $invoices = $user->invoices;
        $cards = $user->cards;
        return view('billing.index', [ "invoices" => $invoices, "cards" => $cards ]);
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
        // dd($request->amount);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
        $result = Stripe\Charge::create ([
                "amount" => 100 * $request->amount,
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

    public function addCreditCard(Request $request) {
        $user = Auth::user();
        Card::create([
            "user_id"=> $user->id,
            "name"=> $request->name,
            "card_number"=> $request->card_number,
            "exp_month"=> $request->exp_month,
            "exp_year"=> $request->exp_year,
            "cvc"=> $request->cvc
        ]);
        return back()->with('success', 'Added successfully made!');
    }

    public function deleteCard($id) {
        Card::where('id', $id)->delete();
        return back()->with('success', 'Deleted successfully made!');
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
