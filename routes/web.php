<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('status', 'PermohonanController@statuspermohonan')->name('statuspermohonan');
Route::post('status', 'PermohonanController@checkpermohonan')->name('checkpermohonan');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group( ['middleware' => 'auth'], function() {

  // Route senarai users
  Route::get('users', 'UsersController@index')->name('users');

  // Route tambah maklumat user
  Route::get('users/add', 'UsersController@create')->name('paparborangtambahuser');
  Route::post('users/add', 'UsersController@store')->name('simpanrekodtambahuser');

  // Route maklumat user berdasarkan ID
  Route::get('users/{id}', 'UsersController@show')->where('id', '[0-9]+')->name('lihatuser');
  Route::get('users/{id}/edit', 'UsersController@edit')->where('id', '[0-9]+')->name('edituser');
  Route::patch('users/{id}/edit', 'UsersController@update')->where('id', '[0-9]+')->name('updateuser');
  Route::delete('users/{id}', 'UsersController@destroy')->where('id', '[0-9]+')->name('deleteuser');

  // Route senarai users
  Route::get('exams', 'ExamsController@index')->name('exams');

  // Route tambah maklumat exam
  Route::get('exams/add', 'ExamsController@create')->name('paparborangtambahexam');
  Route::post('exams/add', 'ExamsController@store')->name('simpanrekodtambahexam');

  // Route maklumat exam berdasarkan ID
  Route::get('exams/{id}', 'ExamsController@show')->name('lihatexam');
  Route::get('exams/{id}/edit', 'ExamsController@edit')->name('editexam');
  Route::patch('exams/{id}/edit', 'ExamsController@update')->name('updateexam');
  Route::delete('exams/{id}', 'ExamsController@destroy')->name('deleteexam');

  // Route paparkan borang permohonan exam
  Route::get('permohonan', 'PermohonanController@index')->name('permohonan');
  Route::get('permohonan/add', 'PermohonanController@create')->name('paparborangpermohonan');
  // Route untuk terima data daripada borang permohonan exam
  Route::post('permohonan/add', 'PermohonanController@store')->name('storepermohonan');
  Route::delete('permohonan/{id}', 'PermohonanController@destroy')->name('deletepermohonan');
  Route::get('permohonan/{id}', 'PermohonanController@edit')->name('editpermohonan');

});
