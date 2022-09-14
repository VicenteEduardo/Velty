<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


     /* start customer */
        Route::get('/clientes','Api\CustomerController@index');
        Route::get('/clientes/{id}','Api\CustomerController@show');
        Route::post('/clientes', 'Api\CustomerController@store');
        Route::put('/clientes/{id}',  'Api\CustomerController@update');
        Route::delete('/clientes/{id}',  'Api\CustomerController@destroy');
        /* end customer */

     /* start AddresseCustomer */
     Route::get('/endereco-clientes','Api\AddresseCustomerController@index');
     Route::get('/endereco-clientes/{id}','Api\AddresseCustomerController@show');
     Route::post('/endereco-clientes', 'Api\AddresseCustomerController@store');
     Route::put('/endereco-clientes/{id}',  'Api\AddresseCustomerController@update');
     Route::delete('/endereco-clientes/{id}',  'Api\AddresseCustomerController@destroy');
     /* end AddresseCustomer */
