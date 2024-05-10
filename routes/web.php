<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('status', [TransactionController::class, 'transactionStatus'])->name('transaction.status');
Route::post('transaction-store', [TransactionController::class, 'storeTransaction'])->name('transaction.store');
Route::get('transactin-update/{id}', [TransactionController::class, 'updateTransaction'])->name('transaction.update');
