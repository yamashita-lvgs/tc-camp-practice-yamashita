<?php
namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Collection;

/**
 * ロールテーブルのモデルクラス
 * @package App\Models
 */
class Role extends BaseModel
{
    /**
     * 全ロール情報取得
     * @return collection 全ロール情報
     */
    public static function getRoles(): collection
    {
        return self::all();
    }
}
