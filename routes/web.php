<?php

Route::get('/', 'HomeController@index');

Route::get('/blog', 'BlogController@index');
Route::get('/blog/create', 'BlogController@create');
Route::post('blog', 'BlogController@store');
Route::get('/blog/edit/{id}', 'BlogController@edit');
Route::post('/blog/edit/{id}', 'BlogController@update');
