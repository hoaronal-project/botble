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
   Route::get('test1',[
       'uses' => 'TestController@test'
   ]);
    Route::get('test2',[
        'uses' => 'TestController@test1'
    ]);
});
