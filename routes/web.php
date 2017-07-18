<?php

Route::get('/', function () {
    return view('welcome');
});

// Route paparkan borang permohonan exam
Route::get('permohonan', 'PermohonanController@paparborangpermohonan')->name('permohonan');
// Route untuk terima data daripada borang permohonan exam
Route::post('permohonan', 'PermohonanController@store')->name('storepermohonan');

Route::get('status', 'PermohonanController@statuspermohonan')->name('statuspermohonan');
Route::post('status', 'PermohonanController@checkpermohonan')->name('checkpermohonan');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
