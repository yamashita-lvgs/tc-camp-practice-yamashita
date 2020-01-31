<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ユーザーテーブルのモデルクラス
 * @package App\Models
 */
class User extends Model
{
    public function userActionHistory()
    {
        return $this->hasMany('App\Models\UserActionHistory');
    }
}
