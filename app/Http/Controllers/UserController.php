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
        return view('user.index', compact('users', 'latestUserOperationHistories', 'historyCount'));
    }

        /**
         * 新規登録画面表示
         * @return ユーザー新規登録画面
         */
        public function showCreateScreen()
        {
            return view('user.create');
        }

        /**
         * 新規登録処理実行
         * @param UserRequest $request リクエスト情報
         * @return ユーザー一覧画面リダイレクト
         */
        public function create(UserRequest $request )
        {
            $validated = $request->validated();
            $user = UserService::InsertUser($validated);
            $users = UserService::GetUsers($user);
//userのid取得したい。
            $user =User::find($id);
            return view('user.createCompletion', ['user'=> $user]);
        }
}
