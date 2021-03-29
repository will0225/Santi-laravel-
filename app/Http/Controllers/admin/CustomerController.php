<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    function index() {
       $customers = User::where('is_admin', 0)->get();
       return view('admin.customer.index', ['customers' => $customers]);
    }

    function show($id) {
        return view('admin.customer.profile');
    }
}
