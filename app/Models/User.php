<?php
namespace App\Models;

use App\Traits\ScreenDateTimeFormat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * ユーザーテーブルのモデルクラス
 * @package App\Models
 */
class User extends Model
{
    use ScreenDateTimeFormat;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

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
     * ユーザーフルネームのアトリビュート定義
     * @return string ユーザーフルネーム
     */
    public function getFullNameAttribute() :string
    {
        return "{$this->last_name} {$this->first_name}";
    }

    /**
     * 全ユーザー情報取得
     * @return collection 全ユーザー情報
     */
    public static function getUsers() :collection
    {
        return self::orderBy('id', 'asc')->get();
    }
//////
        protected $guarded = [];


        public function getActionedFullName()
        {
            return "{$this->actioned_user->last_name} {$this->actioned_user->first_name}";
        }

        public function gender()
        {
            return config('columnName.gender')[$this->gender_id];
        }
    }



