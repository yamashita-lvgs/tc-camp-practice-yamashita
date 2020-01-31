<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserActionHistory;
use App\Services\UserService;
use Config\Action;
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
     * ユーザー一覧画面表示
     * @return ユーザー一覧画面
     */
    public function index()
    {
        $users = UserService::userIndex();
        $userActionHistories = UserService::userActionHistoryIndex();
        return view('user.index', ['users' => $users,'userActionHistories' => $userActionHistories ]);
    }
}
