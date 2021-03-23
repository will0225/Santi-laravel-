<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    function index() {
        return view('admin.invoice.index');
    }
}
