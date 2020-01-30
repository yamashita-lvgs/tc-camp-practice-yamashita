<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ユーザー変更履歴関するクラス
 */
class UserActionHistory extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
