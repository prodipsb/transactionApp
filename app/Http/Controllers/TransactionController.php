<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{

    public function __construct()
    {
        
        $this->middleware('auth');
    }



    public function transactionStatus(){

        return response()
        ->header('X-Mock-Status', 'accepted');
              
    }


    public function storeTransaction(Request $request){


       // $rr = $this->transactionStatus();


        $inputs = $request->all(); 
         $rules = [
             'amount' => 'required',
         ];
         
 
         $validation = Validator::make($inputs, $rules);
 
         if ($validation->fails()) {
 
             return $this->throwMessage(422, 'error', $validation->errors()->first());
         }

         $storeInput = [
            'uuid' => substr(md5(mt_rand()), 0, 16),
            'user_id' => Auth::user()->id,
            'amount' => $request->amount,
            'description' => $request->description
         ];

         Transaction::create($storeInput);

         return Redirect::to(route('home'))
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate');
        
    }


    public function updateTransaction(Request $request){

        $transaction = Transaction::where('uuid', $request->id);
        dd($transaction);
        
        
    }
}
