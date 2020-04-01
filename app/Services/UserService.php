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
        return User::getUsersWithTrashed();
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
     * @param int $userId ユーザーID
     * @param array $attribute 更新するユーザー情報
     * @return User 更新したユーザーインスタンス
     */
    public static function updateUser(int $userId, array $attribute): User
    {
        User::findOrFail($userId)->fill($attribute)->save();
        return User::findOrFail($userId);
    }

    /**
     * ユーザー情報削除
     * @param int $userId ユーザーID
     * @return User 削除したユーザーインスタンス
     */
    public static function deleteUser(int $userId): User
    {
        User::findOrFail($userId)->delete();
        return User::getByIdWithTrashed($userId);
    }

    /**
     * ログインしているユーザーの情報を取得する
     * @return User ユーザーインスタンス
     */
    public static function getLoginUser(): User
    {
        $authUserId = session()->get('user_id');
        return User::findOrFail($authUserId);
    }
}
