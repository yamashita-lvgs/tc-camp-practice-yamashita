<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ユーザー操作履歴テーブルのモデルクラス
 * @package App\Models
 */
class UserOperationHistory extends Model
{
    public function operated_user()
    {
        return $this->belongsTo(User::class, 'operated_user_id');
    }

    public function operating_user()
    {
        return $this->belongsTo(User::class, 'operating_user_id');
    }

    /**
     * 全操作項目の取得
     * @return 全操作項目
     */
    public function getOperationNameAttribute()
    {
        return OPERATIONS_TYPE[$this->operation_id];
    }
}
