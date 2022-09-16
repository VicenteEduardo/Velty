<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/* start customer */

Route::get('/clientes', 'Api\CustomerController@index');
Route::get('/clientes/{id}', 'Api\CustomerController@show');
Route::post('/clientes', 'Api\CustomerController@store');
Route::put('/clientes/{id}',  'Api\CustomerController@update');
Route::delete('/clientes/{id}',  'Api\CustomerController@destroy');
/* end customer */

/* start AddresseCustomer */
Route::get('/endereco-clientes', 'Api\AddresseCustomerController@index');
Route::get('/endereco-clientes/{id}', 'Api\AddresseCustomerController@show');
Route::post('/endereco-clientes', 'Api\AddresseCustomerController@store');
Route::put('/endereco-clientes/{id}',  'Api\AddresseCustomerController@update');
Route::delete('/endereco-clientes/{id}',  'Api\AddresseCustomerController@destroy');
/* end AddresseCustomer */

/* start Building */
Route::get('/predios', 'Api\BuildingController@index');
Route::get('/predios/{id}', 'Api\BuildingController@show');
Route::post('/predios', 'Api\BuildingController@store');
Route::put('/predios/{id}',  'Api\BuildingController@update');
Route::delete('/predios/{id}',  'Api\BuildingController@destroy');
/* end Building */
/* start Building */
Route::get('/endereco-predios', 'Api\BuildingAddress@index');
Route::get('/endereco-predios/{id}', 'Api\BuildingAddress@show');
Route::post('/endereco-predios', 'Api\BuildingAddress@store');
Route::put('/endereco-predios/{id}',  'Api\BuildingAddress@update');
Route::delete('/endereco-predios/{id}',  'Api\BuildingAddress@destroy');
/* end Building */
/* start Room */
Route::get('/salas', 'Api\RoomController@index');
Route::get('/salas/{id}', 'Api\RoomController@show');
Route::post('/salas', 'Api\RoomController@store');
Route::put('/salas/{id}',  'Api\RoomController@update');
Route::delete('/salas/{id}',  'Api\RoomController@destroy');
/* end Room */
/* start RoomTypo */
Route::get('/tipagem-de-salas', 'Api\RoomTypoController@index');
Route::get('/tipagem-de-salas/{id}', 'Api\RoomTypoController@show');
Route::post('/tipagem-de-salas', 'Api\RoomTypoController@store');
Route::put('/tipagem-de-salas/{id}',  'Api\RoomTypoController@update');
Route::delete('/tipagem-de-salas/{id}',  'Api\RoomTypoController@destroy');
      /* end RoomTypo */