<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;


class InvoicesController extends Controller
{
    function index() {
        $invoices = Invoice::get();
        return view('admin.invoice.index', ['invoices' => $invoices]);
    }
}
