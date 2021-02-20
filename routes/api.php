<?php

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

Route::get('/santri', 'ApiPedatrenController@santri');
Route::get('/login', 'ApiPedatrenController@login');
Route::get('/dashboard', 'ApiPedatrenController@dashboard');
Route::get('/formulir/{id}', 'ApiPedatrenController@apiformulir');
Route::get('/foto/person/{id1}/{id2}/{id3}/{id4}', 'ApiPedatrenController@foto');
