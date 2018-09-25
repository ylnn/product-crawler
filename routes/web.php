<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
