<?php


Route::group(['middleware'=>'web'], function () {
    
    Route::get('/', ['uses' => 'IndexController@index', 'as' => 'home']);
    Route::get('/add', ['uses' => 'IndexController@create', 'as' => 'homeCatAdd']);
    Route::post('/add', ['uses' => 'IndexController@store', 'as' => 'homeCatStore']);
    
    Route::auth();
    
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    
    Route::get('/', function () {
        if (view()->exists('admin.index')) {
            $data = ['title' => 'Панель администратора'];
            return view('admin.index', $data);
        }
    });
    
    Route::group(['prefix' => 'admins'], function () {
        
        Route::get('/', ['uses' => 'admin\AdminsController@index', 'as' => 'admins']);
        Route::get('/add', ['uses' => 'admin\AdminsController@create', 'as' => 'adminsAdd']);
        Route::post('/add', ['uses' => 'admin\AdminsController@store', 'as' => 'adminsStore']);
        Route::delete('/edit/{admin}', ['uses' => 'admin\AdminsController@destroy', 'as' => 'adminsDestroy']);
        Route::get('/edit/{admin}', ['uses' => 'admin\AdminsController@edit', 'as' => 'adminsEdit']);
        Route::patch('/edit/{admin}', ['uses' => 'admin\AdminsController@update', 'as' => 'adminsUpdate']);
     
    });
    
    Route::group(['prefix' => 'categories'], function () {
        
        Route::get('/', ['uses' => 'admin\CategoriesController@index', 'as' => 'categories']);
        Route::get('/add', ['uses' => 'admin\CategoriesController@create', 'as' => 'categoriesAdd']);
        Route::post('/add', ['uses' => 'admin\CategoriesController@store', 'as' => 'categoriesStore']);
        Route::delete('/edit/{category}', ['uses' => 'admin\CategoriesController@destroy', 'as' => 'categoriesDestroy']);
        Route::get('/edit/{category}', ['uses' => 'admin\CategoriesController@edit', 'as' => 'categoriesEdit']);
        Route::patch('/edit/{category}', ['uses' => 'admin\CategoriesController@update', 'as' => 'categoriesUpdate']);
     
    });
    
    Route::group(['prefix' => 'questions'], function () {
        
        Route::get('/', ['uses' => 'admin\QuestionsController@index', 'as' => 'questions']);
        Route::get('/add', ['uses' => 'admin\QuestionsController@create', 'as' => 'questionsAdd']);
        Route::post('/add', ['uses' => 'admin\QuestionsController@store', 'as' => 'questionsStore']);
        Route::delete('/edit/{question}', ['uses' => 'admin\QuestionsController@destroy', 'as' => 'questionsDestroy']);
        Route::get('/edit/{question}', ['uses' => 'admin\QuestionsController@edit', 'as' => 'questionsEdit']);
        Route::patch('/edit/{question}', ['uses' => 'admin\QuestionsController@update', 'as' => 'questionsUpdate']);
        
        Route::get('/all', ['uses' => 'admin\QuestionsController@showAll', 'as' => 'questionsShowAll']);
        
        Route::patch('/publicOn/{question}', ['uses' => 'admin\QuestionsController@publicOn', 'as' => 'publicOn']);
        Route::patch('/publicOff/{question}', ['uses' => 'admin\QuestionsController@publicOff', 'as' => 'publicOff']);
     
    });
});    

