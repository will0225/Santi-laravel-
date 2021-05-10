<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Balance;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;
use App\Models\Logs;
use App\Models\Group;
use PDF;

class CustomerController extends Controller
{
    function index() {
       $customers = User::where('is_admin', 0)->get();
       return view('admin.customer.index', ['customers' => $customers]);
    }

    function show($id) {
        $customer = User::where('id', $id)->get();
        $price = $customer[0]->group->price;
        // dd($customer[0]->group);
        $groups = Group::get();
        $transactions = Transaction::where('receiver_id', $customer[0]->id)->get();
        if(count($customer[0]->balances)) {
            $balance = $customer[0]->balances[0]->amount;
        } else {
            $balance = 0;
        }
        $logs = $customer[0]->logs;
     
        return view('admin.customer.profile', 
            [ 
              'customer'=>$customer[0], 
              'transactions' => $transactions,
              'balance' => $balance,
              'invoices' => $customer[0]->invoices,
              'logs' => $logs,
              'price' => json_decode($price),
              'groups' => $groups
            ]
        );
    }

    function update(Request $request, $id) {
        User::where('id', $id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'group_id' => $request->group,
            'is_admin' => $request->admin
        ]);

        return redirect()->back()->with('message', 'Customer updated successfully!');
    }

    function isActive(Request $request) {
        $user = User::where('id', $request->user_id)->get();
        $newUser = User::where('id', $request->user_id)->update(['is_active' => !$user[0]->is_active]);
        Logs::create([
            "user_id" => $user_id,
            "log_type" => "User Active",
            "data" => json_encode(['ip'=>$request->ip(), 'user_agent' => $request->header('User-Agent')]),
            "log_date" => date('Y-m-d H:i:s')
        ]);
        return $newUser;
    }

    function delete(Request $request) {
        $user = Auth::user();
        Logs::create([
            "user_id" => $user->id,
            "log_type" => "Usre Delete",
            "data" => json_encode(['ip'=>$request->ip(), 'user_agent' => $request->header('User-Agent')]),
            "log_date" => date('Y-m-d H:i:s')
        ]);
        User::where('id', $request->user_id)->delete();
        session(['success' => 'Successfully deleted!']);
        return true;
    }

    function addTransaction(Request $request) {
       $user = Auth::user();
       $amount = $request->amount;
       $description = $request->description;
       $customer_id = $request->customer_id;
       $customer = User::where('id', $customer_id)->get();
       if(count($customer[0]->balances)) {
        $balance = $customer[0]->balances[0]->amount;
        if($balance < $amount) {
            return ['status' => false, 'message' => 'This customer has enough balance!'];
            exit;
        } else {
            $result = $customer[0]->balances[0]->update(['amount' => $balance-$amount]);
            Transaction::create([
                'receiver_id'=> $customer_id,
                'sender_id'=> $user->id,
                'type' => 'payment',
                'balance' => $customer[0]->balances[0]->amount,
                'amount' => $amount,
                'description' => $description,
                'cash_on_delivery' => $request->cash
            ]);

            // Invoice::create([
            //     'user_id'=>$customer_id,
            //     'transaction' => true,
            //     'amount' => $amount,
            //     'description' => $description
            // ]);

            Logs::create([
                "user_id" => $user->id,
                "log_type" => "Transaction",
                "data" => json_encode(['ip'=>$request->ip(), 'user_agent' => $request->header('User-Agent')]),
                "log_date" => date('Y-m-d H:i:s')
            ]);

            session(['success' => 'Successfully!']);
            return ['status' => $result, 'message' => 'Success!']; 
        }

       } else {
        return ['status' => false, 'message' => 'This customer has enough balance!'];
        exit;
       }
    }

    public function createInvoicePdf(Request $request, $customer_id, $id) {
      
        $user  = User::where('id', $customer_id)->get();
        $invoice = Invoice::where('id',  $id)->get();
        return view('billing.invoice', 
                  ['amount' => $invoice[0]->amount, 
                   'type'=> $invoice[0]->transaction, 
                   "card_id" => $invoice[0]->card_id,
                   "customer" =>  $user[0],
                   "create_at" => $invoice[0]->created_at       
                  ]);
                  exit;
        $pdf = PDF::loadView('billing.invoice', 
                  ['amount' => $invoice[0]->amount, 
                   'type'=> $invoice[0]->transaction, 
                   "card_id" => $invoice[0]->card_id,
                   "customer" =>  $user[0],
                   "create_at" => $invoice[0]->created_at,  
                   "user" => $user          
                  ]);
        Logs::create([
            "user_id" => $user->id,
            "log_type" => "Admin Create Invoice",
            "data" => json_encode(['ip'=>$request->ip(), 'user_agent' => $request->header('User-Agent')]),
            "log_date" => date('Y-m-d H:i:s')
        ]);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
  
    }
}
