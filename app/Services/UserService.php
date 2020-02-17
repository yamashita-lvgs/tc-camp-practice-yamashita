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
     * 新規登録したユーザー情報取得
     * @param $attribute 登録するユーザー情報フルネーム
     * @return User 新規登録したユーザーインスタンス
     */
    public static function insertUser(array $attribute): User
    {
        $insertUser = User::create($attribute);
        return User::getUserId($insertUser->id);
    }
}
