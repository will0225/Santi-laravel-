<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Billing extends Controller
{
    function __construct() {
      
    }

    function index() {
        return view('billing.index');
    }
}
