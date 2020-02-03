<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserOperationHistory;
use App\Services\UserService;
use Config\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $users = UserService::GetUsers();
        $userOperationHistories = UserService::GetUserOperationHistories();
        return view('user.index', ['users' => $users,'userOperationHistories' => $userOperationHistories ]);
    }
}
