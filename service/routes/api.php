<?php

use App\Http\Middleware\UpdateUserMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/transaction','TransactionController@createTransaction')->middleware(UpdateUserMeta::class);
Route::post('/transaction/{id}','TransactionController@updateTransaction')->middleware(UpdateUserMeta::class);;
Route::get('/transactionById/{id}','TransactionController@getTransaction');
Route::get('/transactionByUser/{user_id}','TransactionController@getAllTransaction');

Route::get('/user/balance/{user_id}','BalanceController@getMyBalance');

