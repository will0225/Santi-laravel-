<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Billing;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\InvoicesController;
use App\Http\Controllers\admin\ManagementController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/login');

Route::get('/billing', [Billing::class, 'index'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/account', [AccountController::class, 'index'])->middleware('auth');
Route::post('/account', [AccountController::class, 'profileUpdate'])->middleware('auth')->name('profileUpdate');
Route::post('/password-update', [AccountController::class, 'passwordUpdate'])->middleware('auth')->name('passwordUpdate');

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers/{id}', [CustomerController::class, 'show']);
    Route::get('/invoices', [InvoicesController::class, 'index']);
    Route::get('/management', [ManagementController::class, 'index']);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
