<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\UserRequest;
    use App\Models\User;
    use App\Models\UserActionHistory;
    use App\Services\UserService;
    use Config\Action;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\View\View;


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
            $users = UserService::GetUser();
            $userActionHistories = UserService::GetUserActionHistory();
            return view('user.index', ['users' => $users, 'userActionHistories' => $userActionHistories]);
        }

        /**
         * 新規登録画面表示
         * @return View ユーザー新規登録画面
         */
        public function showCreateScreen()
        {
            return view('user.create');
        }

        /**
         * 新規登録処理実行
         * @param UserRequest $request リクエスト情報
         * @return RedirectResponse     ユーザー編集画面リダイレクト
         */
        public function create(UserRequest $request): RedirectResponse
        {
            $validated = $request->validated();
            $user = DB::transaction(function () use ($validated) {
                $createUser = User::create($validated);
                return $createUser;
            });
            return redirect("/users/{$user->id}/edit")->with('message', 'ユーザー新規登録しました。');
        }
    }
}
