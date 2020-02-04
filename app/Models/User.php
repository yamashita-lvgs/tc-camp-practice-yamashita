<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ユーザーテーブルのモデルクラス
 * @package App\Models
 */
class User extends Model
{
    /**
     * ユーザーフルネームのアトリビュート定義
     * @return ユーザーフルネーム
     */
    public function getFullNameAttribute()
    {
        return "{$this->last_name} {$this->first_name}";
    }

    /**
     * 操作対象ユーザーフルネームのアトリビュート定義
     * @return 操作対象ユーザーフルネーム
     */
    public function getOperatedFullNameAttribute()
    {
        return "{$this->Operated_user->last_name} {$this->Operated_user->first_name}";
    }
    /**
     * 操作実施ユーザーフルネームのアトリビュート定義
     * @return 操作実施ユーザーフルネーム
     */
    public function getOperatingFullNameAttribute()
    {
        return "{$this->Operating_user->last_name} {$this->Operating_user->first_name}";
    }

    public function getOperationAttribute()
    {
        return OPRATIONS_LIST[$this->operation_id];
    }
}
