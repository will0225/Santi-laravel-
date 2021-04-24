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
        $transactions = Transaction::where('receiver_id', $user->id)->get();
        $data['transactions'] = $transactions;
        return view('dashboard', $data);
    }
}
