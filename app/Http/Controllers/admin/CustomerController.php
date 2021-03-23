<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index() {
       return view('admin.customer.index');
    }

    function show($id) {
        return view('admin.customer.profile');
    }
}
