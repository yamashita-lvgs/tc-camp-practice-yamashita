<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Config\Action;

/**
 * ユーザーに関するコントローラークラス
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * ユーザー一覧画面表示
     * @return ユーザー一覧
     */
    public function index()
    {
        $users = UserService::getUsers();
        $latestUserOperationHistories = UserService::getLatestUserOperationHistories();
        $historyCount = config('const.HISTORY_COUNT');
        return view('user.index', compact('users','latestUserOperationHistories', 'historyCount'));
    }
}


