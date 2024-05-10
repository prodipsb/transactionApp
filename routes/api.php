<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/test', function(){
    return "Route Okay";
});


Route::prefix('v1/transaction/')->group(function () {
    // Route::prefix('/v1/transaction/')->group(function () {
    // Route::middleware('auth:api')->group(function () {

//  Route::middleware('auth')->prefix('/v1/transaction/')->group(function () {


// Route::group(['middleware' => ['web']], function () {

     //========= Transaction Routes ==========
      Route::get('status', [TransactionController::class, 'transactionStatus'])->name('transaction.status');
      Route::post('store', [TransactionController::class, 'storeTransaction'])->name('transaction.store');
      Route::post('update', [TransactionController::class, 'updateTransaction'])->name('transaction.update');


});


