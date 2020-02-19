<?php
namespace App\Models;

use App\Traits\ScreenDateTimeFormat;
use App\Traits\UserObservable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * ユーザーテーブルのモデルクラス
 * @package App\Models
 */
class User extends BaseModel
{
    use ScreenDateTimeFormat;

    use UserObservable;

    use SoftDeletes;

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    public function updated_user()
    {
        return $this->belongsTo(User::class, 'updated_user_id');
    }

    /**
     * 性別名称のアトリビュート定義
     * @return string 性別名称
     */
    public function getGenderNameAttribute() :string
    {
        return GENDER_NAME_LIST[$this->gender_id];
    }

    /**
     * フルネームのアトリビュート定義
     * @return string フルネーム
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->last_name} {$this->first_name}";
    }
    /**
     * フルネーム（カナ）のアトリビュート定義
     * @return string フルネーム（カナ）
     */
    public function getFullNameKanaAttribute(): string
    {
        return "{$this->last_name_kana} {$this->first_name_kana}" ;
    }

    /**
     * 全ユーザー情報取得
     * @return Collection 全ユーザー情報
     */
    public static function getUsers(): Collection
    {
        return self::orderBy('id', 'asc')->get();
    }

    /**
     * 指定されたIDのユーザー情報取得
     * @param $userId 該当するユーザーID
     * @return User 該当するユーザーインスタンス
     */
    public static function getUserById(int $userId): User
    {
        return User::findOrFail($userId);
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
    public static function deleteUser(int $userId)
    {
        User::find($userId)->delete();
        return self::orderBy('id', 'asc')->get();
    }
}
