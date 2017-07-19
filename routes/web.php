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

// Routes senarai users
Route::get('users', 'UsersController@index')->name('users');

// Route tambah maklumat user
Route::get('users/add', 'UsersController@create')->name('paparborangtambahuser');
Route::post('users/add', 'UsersController@store')->name('simpanrekodtambahuser');

// Route maklumat user berdasarkan ID
Route::get('users/{id}', 'UsersController@show')->where('id', '[0-9]+')->name('lihatuser');






Route::get('exams', 'ExamsController@index')->name('exams');
Route::get('exams/{id}', 'ExamsController@show')->name('lihatexam');
