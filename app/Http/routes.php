<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos','CheckoutController@getProdutos');
Route::get('/listar','CheckoutController@getListProdutos');

Route::get('/session','Api\PagSeguroController@getSessionId');
Route::post('/order','Api\OrdersController@store');

Route::get('/checkout/{valorTotal}','CheckoutController@getCheckout');

Route::post('/produtos','CheckoutController@postCadastrar');
