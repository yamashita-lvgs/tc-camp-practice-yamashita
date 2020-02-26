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
    use ScreenDateTimeFormat, UserObservable, SoftDeletes;

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_user_id')->withTrashed();
    }

    public function updated_user()
    {
        return $this->belongsTo(User::class, 'updated_user_id')->withTrashed();
    }

    public function deleted_user()
    {
        return $this->belongsTo(User::class, 'deleted_user_id')->withTrashed();
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
     * パスワード暗号化のアトリビュート定義
     * @param string $password パスワード
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = encrypt($password);
    }

    /**
     * 論理削除されたユーザー情報を含む全ユーザー情報取得
     * @return Collection 論理削除されたユーザー情報を含む全ユーザー情報
     */
    public static function getUsersWithTrashed(): Collection
    {
        return self::withTrashed()->orderBy('id', 'asc')->get();
    }

    /**
     * 論理削除されたユーザー情報を含む指定されたIDのユーザー情報取得
     * @param int $userId ユーザーID
     * @return User 論理削除されたユーザー情報を含む指定されたIDのユーザーインスタンス
     */
    public static function getByIdWithTrashed(int $userId): User
    {
        return self::withTrashed()->findOrFail($userId);
    }
}
