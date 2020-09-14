<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

//==========================================//


Route::namespace('App\Http\Controllers')->group(function() {
    Route::post('/contacts', "ContactController@create");
    Route::get('/contacts', "ContactController@index");
    Route::get('/contacts/{id}', "ContactController@show");
    Route::put('/contacts/{id}', "ContactController@update");
    Route::delete('/contacts/{id}', "ContactController@delete");
});
