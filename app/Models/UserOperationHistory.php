<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ユーザー変更履歴テーブルのモデルクラス
 * @package App\Models
 */
class UserOperationHistory extends Model
{
    public function actioned_user()
    {
        return $this->belongsTo(User::class, 'actioned_user_id');
    }

    public function actioning_user()
    {
        return $this->belongsTo(User::class, 'actioning_user_id');
    }

    public function content()
    {
        return config('action.content')[$this->content_id];
    }
}
