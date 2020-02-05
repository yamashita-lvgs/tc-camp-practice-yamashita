<?php
namespace App\Models;

use App\Traits\TimestampScreen;
use Illuminate\Database\Eloquent\Model;

/**
 * ユーザーテーブルのモデルクラス
 * @package App\Models
 */
class User extends Model
{
    use TimestampScreen;

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    public function updatedUser()
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
     * @return 全ユーザー情報
     */
    public static function getUsers()
    {
        return self::orderBy('name', 'asc')->get();
    }
}
