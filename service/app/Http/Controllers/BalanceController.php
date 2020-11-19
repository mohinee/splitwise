<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMeta;
use App\Http\Resources\UserMetaResource;

class BalanceController extends Controller
{
    public function getMyBalance(Request $request){
        $userMeta = UserMeta::where('user_id',$request->user_id)->get();
        return (new UserMetaResource($userMeta))
        ->response()
        ->setStatusCode(201);
    }

    public function updateUserMeta(Request $request){
        $userMeta = UserMeta::firstOrCreate(['user_id'=>$request->payer_id]);
        $userMeta->balance = (isset($userMeta->balance) ? $userMeta->balance : 0) + $request->amount;
        $userMeta->save();
        
        foreach($request->paid_for as $key => $userId){
            $userMeta = UserMeta::firstOrCreate(['user_id'=>$userId]);
            $finalApplicableAmount = $this->getAmount($request->amount,  $request->split_type, $request->split_factor[$key], $request->split_factor);
            $userMeta->balance = (isset($userMeta->balance) ? $userMeta->balance : 0)  - $finalApplicableAmount;
            $userMeta->save();
            $calculated_amount[$key] = $finalApplicableAmount;
        }
        
        $request->merge(['calculated_amount'=> $calculated_amount]);
        return $request;
    }

    private function getAmount($totalAmount, $splitType, $splitFactor, $totalSplits){
        
        switch($splitType){
            case 'EXACT':
                return $splitFactor;
            break;
            case 'EQUAL':
                $sum = 0;
                foreach($totalSplits as $split){
                    $sum += $split;
                }
                $sum = $sum ? $sum : 1;
                $amt = ($splitFactor * $totalAmount)/$sum;
                return $amt;
            break;
            case 'PERCENT':
                $amt = ($splitFactor * $totalAmount)/100;
                return $amt;
            break;
        }   
    }
}
