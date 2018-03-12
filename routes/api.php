<?php

Route::resource('/posts', 'Api\BlogPostController')->except([
    'create',
    'edit',
]);

Route::post('/comments', 'Api\BlogPostController@storeComment');
