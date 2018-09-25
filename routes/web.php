<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->namespace('Admin')->group(function(){
    //dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //source
    Route::get('/source', 'SourceController@index')->name('source.index');
    Route::get('/source/create', 'SourceController@create')->name('source.create');
    Route::post('/source/store', 'SourceController@store')->name('source.store');
    Route::delete('source', 'SourceController@destroy')->name('source.destroy');
});
