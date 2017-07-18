<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('permohonan', 'PermohonanController@paparborangpermohonan')->name('permohonan');

Route::get('status', 'PermohonanController@statuspermohonan');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
