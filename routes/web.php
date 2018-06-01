<?php

Route::resource('/', 'SiteController', ['only' => ['index'],
    'names' => ['index' => 'home']
]);

Route::match(['get', 'post'], '/question', 'QuestionController@show')->name('question');

Route::get('/login', 'LoginController@show')->name('login');



