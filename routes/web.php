<?php

Route::group(['middleware' => 'web'], function () {

    Route::resource('/', 'IndexController', ['only' => ['index', 'create', 'store']]);
    Route::auth();
    
});

Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'AdminpanelController@index')->name('adminpanel');
    Route::get('/need_answer', 'QuestionController@showAll')->name('questionsShowAll');
    Route::get('/On/{question}', 'QuestionController@publicOn')->name('publicOn');
    Route::get('/Off/{question}', 'QuestionController@publicOff')->name('publicOff');

    Route::resource('admins', 'AdminController', ['except' => ['show']]);
    Route::resource('categories', 'CategoryController', ['except' => ['show', 'edit', 'update']]);
    Route::resource('questions', 'QuestionController', ['except' => ['create', 'store', 'show']]);
    
});

