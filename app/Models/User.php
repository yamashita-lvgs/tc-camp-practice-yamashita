<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ユーザーテーブルのモデルクラス
 * @package App\Models
 */
class User extends Model
{
    public function getFullNameAttribute()
    {
        return "{$this->last_name} {$this->first_name}";
    }

    public function getOperatedFullNameAttribute()
    {
        return "{$this->Operated_user->last_name} {$this->Operated_user->first_name}";
    }

    public function getOperatingFullNameAttribute()
    {
        return "{$this->Operating_user->last_name} {$this->Operating_user->first_name}";
    }

    public function getOperationAttribute()
    {
        return OPRATIONS_LIST[$this->operation_id];
    }
}
