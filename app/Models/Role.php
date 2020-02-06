<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * ロールテーブルのモデルクラス
 * @package App\Models
 */
class Role extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    /**
     * 全ユーザー情報取得
     * @return collection 全ユーザー情報
     */
    public static function getRoles(): collection
    {
        return self::all();
    }
}
