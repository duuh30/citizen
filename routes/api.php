<?php

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

Route::prefix('citizen')->group(function (){
    Route::get('', 'CitizenController@index');
    Route::post('', 'CitizenController@store');
    Route::get('{citizen}', 'CitizenController@show');
    Route::get('cpf/{cpf}', 'CitizenController@findByCpf');
});

