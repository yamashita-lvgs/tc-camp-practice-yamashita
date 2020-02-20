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
     * 指定されたIDのユーザー情報取得
     * @param $userId ユーザーID
     * @return User ユーザーインスタンス
     */
    public static function getUser(int $userId): User
    {
        return User::findOrFail($userId);
    }

    /**
     * ユーザー情報登録
     * @param $user 登録するユーザー情報
     * @return User 新規登録したユーザーインスタンス
     */
    public static function insertUser($user): User
    {
        return User::create($user);
    }

    /**
     * ユーザー情報更新
     * @param $userId ユーザーID
     * @param $attribute 更新するユーザー情報
     * @return User 更新したユーザーインスタンス
     */
    public static function updateUser($userId, $attribute): User
    {
        return User::updateUser($userId, $attribute);
    }

    /**
     * ユーザー情報削除
     * @param $userId ユーザーID
     * @param $attribute 削除するユーザー情報
     * @return 削除したユーザーインスタンス
     */
    public static function deleteUser(int $userId)
    {
        return User::deleteUser($userId);
    }
}
