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
    Route::get('users/create', 'UserController@showCreateScreen'); // 初期表示
    Route::post('users/create', 'UserController@create'); // 登録実行



