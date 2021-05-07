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
Route::post('/billing', [Billing::class, 'makePayment'])->middleware('auth')->name('make-payment');
Route::post('/cards', [Billing::class, 'addCreditCard'])->middleware('auth')->name('add-card');
Route::get('/cards/{id}', [Billing::class, 'deleteCard'])->middleware('auth')->name('delete-card');
Route::get('/invoices/pdf/{id}', [Billing::class, 'createInvoicePdf'])->middleware('auth')->name('createInvoicePdf');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/account', [AccountController::class, 'index'])->middleware('auth');
Route::post('/account', [AccountController::class, 'profileUpdate'])->middleware('auth')->name('profileUpdate');
Route::post('/password-update', [AccountController::class, 'passwordUpdate'])->middleware('auth')->name('passwordUpdate');


Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('admin.customer.profile');
    Route::post('/customers/active', [CustomerController::class, 'isActive'])->name('admin.customer.active');
    Route::post('/customers/delete', [CustomerController::class, 'delete'])->name('admin.customer.delete');
    Route::post('/customers/addTransaction', [CustomerController::class, 'addTransaction'])->name('admin.customer.addTransaction');
    Route::get('/invoices', [InvoicesController::class, 'index']);
    Route::get('/invoices/pdf/{customer_id}/{id}', [CustomerController::class, 'createInvoicePdf'])->name('admin.createInvoicePdf');
    Route::get('/management', [ManagementController::class, 'index']);
    Route::post('/management', [ManagementController::class, 'settingUpdate'])->name('admin.management.setting.update');
});

