<?php
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * ロールテーブルのモデルクラス
 * @package App\Models
 */
class Role extends BaseModel
{
    /**
     * 管理者権限判定のアトリビュート定義
     * @return bool 判定結果（true：判定結果OK、false：判定結果NG）
     */
    public function getJudgmentRoleAdminAttribute(): bool
    {
        switch ($this->role_id) {
            case 1:
                return true;
            default:
                return false;
        }
    }

    /**
     * 副管理者権限判定のアトリビュート定義
     * @return bool 判定結果（true：判定結果OK、false：判定結果NG）
     */
    public function getJudgmentRoleDeputyAdminAttribute(): bool
    {
        switch ($this->role_id) {
            case 1:
            case 2:
                return true;
            default:
                return false;
        }
    }

    /**
     * 全ロール情報取得
     * @return Collection 全ロール情報
     */
    public static function getRoles(): Collection
    {
        return self::orderBy('sort', 'asc')->get();
    }
}
