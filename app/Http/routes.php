<?php

/**
 * Show dashboard
 */
Route::get('/', 'CustomerController@index');

/**
 * Add new customer to queue
 */
Route::post('/customer', 'CustomerController@store');