<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ユーザー情報関するクラス
 */
class User extends Model
{
    public function userActionHistory()
    {
        return $this->hasMany('App\Models\UserActionHistory');
    }
}
