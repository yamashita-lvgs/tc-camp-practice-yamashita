<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


/**
 * ユーザーに関するコントローラークラス
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * 一覧画面表示
     * @return View ユーザー一覧画面
     */
    public function index()
    {
        //サービス層のメソッドを使用する
        $users = UserService::index();
        return view('user.index', ['users' => $users]);
    }
}
