<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ユーザー変更履歴関するクラス
 * @property mixed content_id
 */
class UserActionHistory extends Model
{
    use Timestamp;

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
        return config('columnName. action')[$this->content_id];
    }
}
