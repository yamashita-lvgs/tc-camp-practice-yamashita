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

// ログイン画面
Route::get('login', 'AuthController@getLogin'); // 初期表示
Route::post('login', 'AuthController@postLogin'); // ログイン実行
// ログアウト処理
Route::post('logout', 'AuthController@postLogout'); // ログアウト実行

// ユーザーログイン判定
Route::group(['middleware' => ['user.login.session']], function () {
    // トップ画面
    Route::get('/', 'TopController@getTop'); // 初期表示

    // ユーザー副管理者判定
    Route::group(['middleware' => ['role.deputy.admin.user']], function () {
        // ユーザー一覧画面
        Route::get('users', 'UserController@index'); // 初期表示
    });

    // ユーザー管理者判定
    Route::group(['middleware' => ['role.admin.user']], function () {
        // ユーザー登録画面
        Route::get('users/create', 'UserController@getCreate'); // 初期表示
        Route::post('users/create', 'UserController@postCreate'); // 登録実行

        // ユーザー更新画面
        Route::get('users/{id}/update', 'UserController@getUpdate'); // 初期表示
        Route::post('users/{id}/update', 'UserController@postUpdate'); // 更新実行

        // ユーザー削除
        Route::post('users/{id}/delete', 'UserController@postDelete'); // 削除実行
    });
});
