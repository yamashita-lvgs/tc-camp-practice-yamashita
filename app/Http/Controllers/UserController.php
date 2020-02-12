<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserOperationHistoryService;
use App\Services\UserService;
use Config\Action;
use Illuminate\Support\Facades\DB;

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
        $userOperationHistories = UserOperationHistoryService::getScreenLatestUserOperationHistories();
        $historyCount = config('const.HISTORY_COUNT');
        return view('user.index', compact('users', 'userOperationHistories', 'historyCount'));
    }

    /**
     * 新規登録画面表示
     * @return ユーザー新規登録画面
     */
    public function showCreate()
    {
        $genders = GENDER_LIST;
        $roles = UserService::getRoles();
        return view('user.create', compact('genders', 'roles'));
    }

    /**
     * 新規登録処理実行
     * @param UserRequest $request リクエスト情報
     * @return ユーザー新規登録完了画面
     */
    public function postCreate(UserRequest $request)
    {
        $user = DB::transaction(function () use ($request) {
            return UserService::insertUser($request->validated());
        });
        return view('user.createCompletion', compact('user'));
    }
}
