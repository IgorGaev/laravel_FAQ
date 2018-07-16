<?php

Route::group(['middleware' => 'web'], function () {

    Route::get('/', ['uses' => 'IndexController@index', 'as' => 'home']);
    Route::get('/add', ['uses' => 'IndexController@create', 'as' => 'homeCatAdd']);
    Route::post('/add', ['uses' => 'IndexController@store', 'as' => 'homeCatStore']);

    Route::auth();
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', ['uses' => 'admin\AdminpanelController@index', 'as' => 'adminpanel']);

    Route::resources([
        'admins' => 'admin\AdminController',
        'categories' => 'admin\CategoryController',
        'questions' => 'admin\QuestionController'
    ]);

    Route::get('/need_answer', ['uses' => 'admin\AllQuestionsController@show', 'as' => 'questionsShowAll']);
    Route::patch('/On/{question}', ['uses' => 'admin\PublicOnController@publicOn', 'as' => 'publicOn']);
    Route::patch('/Off/{question}', ['uses' => 'admin\PublicOnController@publicOff', 'as' => 'publicOff']);
});

