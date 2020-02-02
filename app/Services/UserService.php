<?php

    namespace App\Services;

    use App\Http\Requests\UserRequest;
    use App\Models\Action;
    use App\Models\User;
    use App\Models\UserActionHistory;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    /**
     * ユーザーのサービスクラス
     * @package App\Services
     */
    class UserService
    {
        public static function getUser()
        {
            return User::all();
        }

        public static function getUserActionHistory()
        {
            return UserActionHistory::all();
        }

        public static function insertUser($validated)
        {
            $user = DB::transaction(function () use ($validated) {
                $createUser = User::create($validated);
                return $createUser;
            });
            return $user();
        }
    }
