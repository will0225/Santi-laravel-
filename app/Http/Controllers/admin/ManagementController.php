<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    function index() {
        return view('admin.management.index');
    }
}
