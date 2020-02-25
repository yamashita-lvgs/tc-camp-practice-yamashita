<?php
namespace App\Http\Controllers;

use App\Services\UserLoginHistoryService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * トップページに関するコントローラークラス
 * @package App\Http\Controllers
 */
class TopController extends Controller
{
    /**
     * トップページ画面表示
     * @return ユーザーログイン画面
     */

    public function getTop()
    {
        $users = UserService::getUsers();
        $userLoginHistories = UserLoginHistoryService::getScreenLatestUserLoginHistories();
        $historyCount = config('const.HISTORY_COUNT');
        return view('top.index', compact('userLoginHistories', 'historyCount'));
    }
}
