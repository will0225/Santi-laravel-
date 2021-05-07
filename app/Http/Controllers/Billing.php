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
use App\Models\Logs;

class Billing extends Controller
{
    function __construct() {
      
    }

    function index() {
        $user = Auth::user();
        $invoices = $user->invoices;
        $cards = $user->paymentMethods();
        $intent = $user->createSetupIntent();
        
        return view('billing.index', [ "invoices" => $invoices, "cards" => $cards, 'intent' => $intent]);
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
        if($request->payment_id) {
            $validated = $request->validate([
                'payment_id' => 'required|max:255',
                'description' => 'required|max:255',
                'amount' => 'required|numeric|min:0.01',
            ]);
            $result = $user->charge(100 * $request->amount, $request->payment_id);
        } else {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            
            $result = Stripe\Charge::create ([
                    "amount" => 100 * $request->amount,
                    "currency" => "eur",
                    "source" => $request->stripeToken,
                    "description" => $request->description 
            ]);

        }
        Invoice::create([
            "user_id" => $user->id,
            "card_id" => $result->id,
            "amount" => $request->amount,
            "description" => $request->description,
            "transaction" => false
        ]);

         
        Logs::create([
            "user_id" => $user->id,
            "log_type" => "Add Fund",
            "data" => json_encode(['ip'=>$request->ip(), 'user_agent' => $request->header('User-Agent')]),
            "log_date" => date('Y-m-d H:i:s')
        ]);


        return back()->with('success', 'Payment successfully made.');
    }

    public function addCreditCard(Request $request) {
        $user = Auth::user();
    
        if(!$user->stripe_id) {
            $stripeCustomer = $user->createAsStripeCustomer();
        }
       
       $user->addPaymentMethod($request->payment_method);
        
        Logs::create([
            "user_id" => $user->id,
            "log_type" => "Add CreditCard",
            "data" => json_encode(['ip'=>$request->ip(), 'user_agent' => $request->header('User-Agent')]),
            "log_date" => date('Y-m-d H:i:s')
        ]);

        return back()->with('success', 'Added successfully made!');
    }

    public function getSetupIntent( Request $request ){
        return $request->user()->createSetupIntent();
    }

    public function deleteCard(Request $request, $id) {
        $user = Auth::user();
        Card::where('id', $id)->delete();
        Logs::create([
            "user_id" => $user->id,
            "log_type" => "Delete Card",
            "data" => json_encode(['ip'=>$request->ip(), 'user_agent' => $request->header('User-Agent')]),
            "log_date" => date('Y-m-d H:i:s')
        ]);
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
        Logs::create([
            "user_id" => $user->id,
            "log_type" => "Create Invoice",
            "data" => json_encode(['ip'=>$request->ip(), 'user_agent' => $request->header('User-Agent')]),
            "log_date" => date('Y-m-d H:i:s')
        ]);
      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');

    }

}
