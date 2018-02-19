<?php

Route::get('/', 'HomeController@index');

Route::get('/blog', 'BlogController@index')->name('blog.list');
Route::get('/blog/create', 'BlogController@create')->name('blog.create');

Route::get('/blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
Route::post('blog', 'BlogController@store');
Route::post('/blog/edit/{id}', 'BlogController@update');

Route::delete('/blog/{id}', 'BlogController@delete')->name('blog.delete');