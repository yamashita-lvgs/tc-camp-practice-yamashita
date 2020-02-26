<?php
namespace App\Http\Controllers;

use App\Services\LoginHistoryService;
use App\Services\UserService;

/**
 * トップページに関するコントローラークラス
 * @package App\Http\Controllers
 */
class TopController extends Controller
{
    /**
     * トップページ画面表示
     * @return トップページ画面
     */
    public function getTop()
    {
        $users = UserService::getUsers();
        $loginHistories = LoginHistoryService::getScreenLatestLoginHistories();
        $historyCount = config('const.HISTORY_COUNT');
        return view('top.index', compact('loginHistories', 'historyCount'));
    }
}
