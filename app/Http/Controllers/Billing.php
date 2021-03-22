<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Billing extends Controller
{
    function index() {
        return view('billing.index');
    }
}
