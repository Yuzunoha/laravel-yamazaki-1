<?php

use App\Book;
use Illuminate\Http\Request;

// 本ダッシュボード表示
Route::get('/', 'BooksController@index');

// 登録処理
Route::post('/books','BooksController@store');

// 更新画面
Route::post('/booksedit/{book}', 'BooksController@booksedit');

// 更新処理
Route::post('/books/update','BooksController@update');

// store
Route::post('/books','BooksController@store');

// 本を削除
Route::delete('/book/{book}', 'BooksController@delete');

Auth::routes();
Route::get('/home', 'BooksController@index')->name('home');
