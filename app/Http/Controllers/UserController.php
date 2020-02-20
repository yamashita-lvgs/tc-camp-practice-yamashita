<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateUserUserRequest;
use App\Http\Requests\UpdateUserUserRequest;
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
     * @param UpdateUserUserRequest $request リクエスト情報
     * @return ユーザー新規登録完了画面
     */
    public function postCreate(CreateUserUserRequest $request)
    {
        $user = DB::transaction(function () use ($request) {
            return UserService::insertUser($request->validated());
        });
        $message = 'ユーザー登録完了';
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
        $user = UserService::getUserById($userId);
        return view('user.update', compact('user', 'genders', 'roles'));
    }

    /**
     * 更新処理実行
     * @param UpdateUserUserRequest $request リクエスト情報
     * @param int $userId ユーザーID
     * @return ユーザー更新完了画面
     */
    public function postUpdate(UpdateUserUserRequest $request, int $userId)
    {
        $user = DB::transaction(function () use ($request, $userId) {
            return UserService::updateUser($userId, $request->validated());
        });
        $message = 'ユーザー更新完了';
        return view('user.completion', compact('user', 'message'));
    }


    /**
     * 論理削除処理実行
     * @param  int $userId      ユーザーID
     * @return ユーザー一覧画面リダイレクト
     */
    public function delete(int $userId)
    {
        DB::transaction(function () use ($userId)
        {
            return UserService::deleteUser($userId);
        });
        return redirect("/users");
    }
}
