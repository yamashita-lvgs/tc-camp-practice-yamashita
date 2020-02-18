<?php
namespace App\Models;

use App\Traits\ScreenDateTimeFormat;
use App\Traits\UserObservable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


/**
 * ユーザーテーブルのモデルクラス
 * @package App\Models
 */
class User extends BaseModel
{
    /**
     * 日時分漢字表示のトレイト
     */
    use ScreenDateTimeFormat;

    use UserObservable;

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
        return $this === null ? "" :"{$this->last_name_kana} {$this->first_name_kana}";
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
     * 新規ユーザー登録
     * @param $attribute 登録するユーザー情報
     * @return User 作成されたユーザーインスタンス
     */
    public static function createUser(array $attribute): User
    {
        return User::create($attribute);
    }

    /**
     * ユーザーID取得
     * @param $userId ユーザーID
     * @return User 該当するユーザーインスタンス
     */
    public static function getUserId(int $userId): User
    {
        return User::findOrFail($userId);
    }
}
