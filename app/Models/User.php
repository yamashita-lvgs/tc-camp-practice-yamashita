<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TimestampScreen;
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
     * @return ユーザーフルネーム
     */
    public function getFullNameAttribute()
    {
        return "{$this->last_name} {$this->first_name}";
    }

}
