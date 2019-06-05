<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix'=>'test'], function (){
   Route::get('test',[
       'uses' => 'TestController@test'
   ]);
    Route::get('news',[
        'uses' => 'TestController@crawlNews'
    ]);
    Route::get('views',[
        'uses' => 'TestController@getTestViews'
    ]);
    Route::get('find',[
        'uses' => 'TestController@find_replace'
    ]);
    Route::get('p/{id?}',[
        'as' => 'test.detail',
        'uses' => 'TestController@getDetails'
    ]);
});
