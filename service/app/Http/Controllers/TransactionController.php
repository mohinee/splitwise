<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\TransactionResource;

class TransactionController extends Controller
{
   
    public function createTransaction(Request $request){
       
        Log::info("Request: ".json_encode($request));
        $transact = new Transaction();
        $transact->user_id = $request->payer_id;
        $transact->amount = $request->amount;
        $transact->save();
        Log::info("transaction: ".json_encode($transact));
        Log::info("paidFor: ".json_encode($request->paid_for));
        
        foreach($request->paid_for as $key => $userId){
            $transactMeta = new TransactionMeta();
            $transactMeta->payer_id = $request->payer_id;
            $transactMeta->transaction_id = $transact->id;
            $transactMeta->amount = $request->calculated_amount[$key];
            $transactMeta->split_type = $request->split_type;
            $transactMeta->split_factor = $request->split_factor[$key];
            $transactMeta->user_id = $userId;
            $transactMeta->is_active =(bool)true;
            $transactMeta->save();
            Log::info("transactMeta: ".json_encode($transactMeta));
        }

        return (new TransactionResource($transact))
        ->response()
        ->setStatusCode(201);
    
    }

    public function updateTransaction(Request $request){
        $transact = Transaction::findOrFail($request->transaction_id);
        $transact->user_id = $request->payer_id;
        $transact->amount = $request->amount;
        if($transact->isDirty()){
            $transact->save();
        }

        foreach($request->paid_for as $key => $userId){
            $transactMeta = TransactionMeta::where(['transaction_id', $request->transaction_id],['user_id',$userId])->first();
            $transactMeta->payer_id = $request->payer_id;
            $transactMeta->transaction_id = $transact->id;
            $transactMeta->amount = $request->calculated_amount[$key];
            $transactMeta->split_type = $request->split_type;
            $transactMeta->split_factor = $request->split_factor[$key];
            $transactMeta->user_id = $userId;
            $transactMeta->is_active = isset($request->is_active) ? $request->is_active : true;
            if($transactMeta->isDirty()){
                $transactMeta->save();
            }
            Log::info("transactMeta: ".json_encode($transactMeta));
        }

        return (new TransactionResource($transact))
        ->response()
        ->setStatusCode(201);
        
    }

    public function deleteTransaction(Request $request){
        
    }

    public function getTransaction(Request $request){ 
        $transact = TransactionMeta::where('transaction_id',$request->id)->get();
        Log::info("transactMeta: ".json_encode($transact));
        return (new TransactionResource($transact))
        ->response()
        ->setStatusCode(201);
    }


    public function getAllTransaction(Request $request){ 
        $transact = TransactionMeta::where('user_id',$request->user_id)->orWhere('payer_id',$request->user_id)->get();
        Log::info("getAllTransaction: ".json_encode($transact));
        return (new TransactionResource($transact))
        ->response()
        ->setStatusCode(201);
    }
 
}
