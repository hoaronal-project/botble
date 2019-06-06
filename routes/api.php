<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix'=>'v1'], function(){
    Route::get('articles',[
        'uses' =>'Api\ArticleController@index'
    ]);
    Route::get('articles/{id}',[
        'uses' =>'Api\ArticleController@show'
    ]);
    Route::post('articles',[
        'uses' =>'Api\ArticleController@store'
    ]);
    Route::put('articles',[
        'uses' =>'Api\ArticleController@update'
    ]);
    Route::delete('articles/{id}',[
        'uses' =>'Api\ArticleController@delete'
    ]);
});

