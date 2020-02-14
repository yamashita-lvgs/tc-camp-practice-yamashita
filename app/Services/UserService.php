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
     * @return Collection 全ユーザー情報
     */
    public static function getUsers(): Collection
    {
        return User::getUsers();
    }

    /**
     * 全ロール情報取得
     * @return array 全ロール情報
     */
    public static function getScreenRoles(): array
    {
        return Role::getRoles()->pluck('name', 'id')->toArray();
    }

    /**
     * 新規登録したユーザーID取得
     * @return User　新規登録したユーザーID
     */
    public static function insertUser(array $validated): User
    {
        $insertUser = User::createUser($validated);
        return User::getUserId($insertUser->id);
    }
}
