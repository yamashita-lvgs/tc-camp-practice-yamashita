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
Route::get('users/create', 'UserController@getCreate'); // 初期表示
Route::post('users/create', 'UserController@postCreate'); // 登録実行

// ユーザー更新画面
Route::get('users/{id}/update', 'UserController@getUpdate'); // 初期表示
Route::post('users/{id}/update', 'UserController@postUpdate'); // 登録実行

// ユーザー削除
Route::post('users/{id}/delete', 'UserController@postDelete'); // 削除実行

// ユーザーログイン画面
Route::get('login', 'AuthController@getLogin'); // 初期表示

Route::post('login',['uses' => 'AuthController@postLogin']);

// トップ画面
Route::get('/', 'TopController@getTop'); // 初期表示
