<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;
use App\Models\Balance;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

class DashboardController extends Controller
{
    function index() {
        $user = Auth::user();
        $data = [];
        if(count($user->balances)) {
            $data['balance'] = $user->balances[0]->amount;
        } else {
            $data['balance'] = 0;
        }
        $transactions = Transaction::where(['receiver_id'=>$user->id,'cash_on_delivery' => 0 ])->get();
        $cash_on_delivery = Transaction::where(['receiver_id'=>$user->id, 'cash_on_delivery' => 1 ])->get();
        $data['transactions'] = $transactions;
        $data['cash_on_delivery'] = $cash_on_delivery;
        return view('dashboard', $data);
    }
}
