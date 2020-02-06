<?php
namespace App\Models;

use App\Models\BaseModel;
use App\Traits\ScreenDateTimeFormat;
use App\Traits\UserObservable;
use Illuminate\Database\Eloquent\Collection;

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
    /**
     * ユーザー作成時ユーザー操作履歴更新のイベントのトレイト
     */
    use UserObservable;


//    protected $guarded = [];

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
     * 該当する性別のアトリビュート定義
     * @return 該当する性別
     */
    public function getGenderAttribute()
    {
        return GENDER_LIST[$this->gender_id];
    }

    /**
     * ユーザー漢字フルネームのアトリビュート定義
     * @return string ユーザーフルネーム
     */
    public function getFullNameAttribute() :string
    {
        return "{$this->last_name} {$this->first_name}";
    }

    /**
     * ユーザーカナフルネームのアトリビュート定義
     * @return string ユーザーフルネーム
     */
    public function getFullNameKanaAttribute() :string
    {
        return "{$this->last_name_kana} {$this->first_name_kana}";
    }

    /**
     * 全ユーザー情報取得
     * @return collection 全ユーザー情報
     */
    public static function getUsers(): collection
    {
        return self::orderBy('id', 'asc')->get();
    }

}



