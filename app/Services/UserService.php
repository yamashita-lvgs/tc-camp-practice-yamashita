<?php
namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * ユーザー情報のサービスクラス
 * @package App\Services
 */
class UserService
{
    /**
     * 全ユーザー情報取得
     * @return collection 全ユーザー情報
     */
    public static function getUsers(): collection
    {
        return User::getUsers();
    }

    /**
     * 全ロール情報取得
     * @return collection 全ロール情報
     */
    public static function getRoles(): collection
    {
        return Role::getRoles();
    }

    /**
     * ユーザーID取得
     * @return user ユーザーID
     */
    public static function getUserId(int $userId): user
    {
        return User::getUserId($userId);
    }

    /**
     * 新規登録したユーザーID取得
     * @return user　新規登録したユーザーID
     */
    public static function insertUser(array $validated): user
    {
        $insertUser = User::createUser($validated);
        return UserService::getUserId($insertUser->id);
    }
}

