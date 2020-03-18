<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
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
        $authUser = UserService::getUser(session('user_id'));
        return view('user.index', compact('users', 'userOperationHistories', 'historyCount', 'authUser'));
    }

    /**
     * 新規登録画面表示
     * @return ユーザー新規登録画面
     */
    public function getCreate()
    {
        $user = new User();
        $genders = GENDER_NAME_LIST;
        $roles = UserService::getScreenRoles();
        $message = '登録';
        return view('user.form', compact('user', 'message', 'genders', 'roles'));
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
        $message = '登録';
        return view('user.completion', compact('user', 'message'));
    }

    /**
     * 更新画面表示
     * @param $userId ユーザーID
     * @return ユーザー更新画面
     */
    public function getUpdate(int $userId)
    {
        $genders = GENDER_NAME_LIST;
        $roles = UserService::getScreenRoles();
        $user = UserService::getUser($userId);
        $message = '更新';
        return view('user.form', compact('user', 'message', 'genders', 'roles'));
    }

    /**
     * 更新処理実行
     * @param UpdateUserRequest $request リクエスト情報
     * @param int $userId ユーザーID
     * @return ユーザー更新完了画面
     */
    public function postUpdate(UpdateUserRequest $request, int $userId)
    {
        $user = DB::transaction(function () use ($request, $userId) {
            return UserService::updateUser($userId, $request->validated());
        });
        $message = '更新';
        return view('user.completion', compact('user', 'message'));
    }

    /**
     * 削除処理実行
     * @param int $userId ユーザーID
     * @return  ユーザー削除完了画面
     */
    public function postDelete(int $userId)
    {
        $user = DB::transaction(function () use ($userId) {
            return UserService::deleteUser($userId);
        });
        $message = '削除';
        return view('user.completion', compact('user', 'message'));
    }
}
