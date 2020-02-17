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

// ユーザー一覧画面
Route::get('users', 'UserController@index'); // 初期表示

// ユーザー登録画面
Route::get('users/create', 'UserController@showCreate'); // 初期表示
Route::post('users/create', 'UserController@postCreate'); // 登録実行

// ユーザー更新画面
Route::get('users/{id}/edit', 'UserController@showEdit'); // 初期表示
Route::post('users/{id}/edit', 'UserController@postEdit'); // 登録実行
