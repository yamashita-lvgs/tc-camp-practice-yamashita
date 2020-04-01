<?php
namespace App\Http\Controllers;

use App\Services\LoginHistoryService;
use App\Services\UserService;

/**
 * トップ画面に関するコントローラークラス
 * @package App\Http\Controllers
 */
class TopController extends Controller
{
    /**
     * トップ画面表示
     * @return トップ画面
     */
    public function getTop()
    {
        $users = UserService::getUsers();
        $loginHistories = LoginHistoryService::getScreenLatestLoginHistories();
        $historyCount = config('const.HISTORY_COUNT');
        $authUser = UserService::getUserByUserSession();
        return view('top.index', compact('loginHistories', 'historyCount', 'authUser'));
    }
}
