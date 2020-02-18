<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\UserOperationHistoryService;
use App\Services\UserService;
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
    public function getCreate()
    {
        $genders = GENDER_NAME_LIST;
        $roles = UserService::getScreenRoles();
        return view('user.create', compact('genders', 'roles'));
    }

    /**
     * 新規登録処理実行
     * @param CreateUserRequest $request リクエスト情報
     * @return ユーザー新規登録完了画面
     */
    public function postCreate(CreateUserRequest $request)
    {
        $user = DB::transaction(function () use ($request) {
            return UserService::insertUser($request->validated());
        });
        return view('user.createCompletion', compact('user'));
    }
  
    /**
     * 編集画面表示
     * @return ユーザー編集画面
     */
    public function showEdit(Request $request)
    {
        $user =UserService::getUser($request->id);
        $genders = GENDER_LIST;
        $roles = UserService::getScreenRoles();
        return view('user.edit', compact('user', 'genders', 'roles'));
    }

    /**
     * 更新処理実行
     * @param CreateUserRequest $request リクエスト情報
     * @return ユーザー新規登録完了画面
     */
    public function postEdit(CreateUserRequest $request)
}
