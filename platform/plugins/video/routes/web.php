<?php

Route::group(['namespace' => 'Botble\Video\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'videos'], function () {

            Route::get('/', [
                'as' => 'video.list',
                'uses' => 'VideoController@getList',
            ]);

            Route::get('/create', [
                'as' => 'video.create',
                'uses' => 'VideoController@getCreate',
            ]);

            Route::post('/create', [
                'as' => 'video.create',
                'uses' => 'VideoController@postCreate',
            ]);

            Route::get('/edit/{id}', [
                'as' => 'video.edit',
                'uses' => 'VideoController@getEdit',
            ]);

            Route::post('/edit/{id}', [
                'as' => 'video.edit',
                'uses' => 'VideoController@postEdit',
            ]);

            Route::get('/delete/{id}', [
                'as' => 'video.delete',
                'uses' => 'VideoController@getDelete',
            ]);

            Route::post('/delete-many', [
                'as' => 'video.delete.many',
                'uses' => 'VideoController@postDeleteMany',
                'permission' => 'video.delete',
            ]);
        });
    });
    
});