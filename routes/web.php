<?php

Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/blog/create', 'BlogController@create')->name('blog.create');

    Route::get('/blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
    Route::post('blog', 'BlogController@store');
    Route::post('/blog/edit/{id}', 'BlogController@update');

    Route::delete('/blog/{id}', 'BlogController@delete')->name('blog.delete');
});
