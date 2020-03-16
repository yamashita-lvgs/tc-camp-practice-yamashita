<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

/**
 * ロールテーブルのモデルクラス
 * @package App\Models
 */
class Role extends BaseModel
{
    /**
     * 全ロール情報取得
     * @return Collection 全ロール情報
     */
    public static function getRoles(): Collection
    {
        return self::orderBy('sort', 'asc')->get();
    }
}
