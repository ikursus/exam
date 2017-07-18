<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('permohonan', function () {

  $page_title = 'Status Permohonan Exam';

  return view('permohonan/template_permohonan', compact('page_title'));

})->name('permohonan');

Route::get('status', function () {

  $page_title = 'Status Permohonan Exam';
  $variable1 = '<h1>Variable 1</h1>';
  $variable2 = 2;

  return view('permohonan/template_status', compact('page_title', 'variable1', 'variable2') );
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
