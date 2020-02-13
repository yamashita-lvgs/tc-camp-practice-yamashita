<?php
namespace App\Observers;

use App\Models\User;
use App\Models\UserOperationHistory;

/**
 * ユーザーのオブザーバークラス
 * @package App\Observers
 */
class UserObserver
{
    /**
     * ユーザー操作履歴登録用データを取得
     * @param $user 登録用ユーザーテーブルのカラム
     * @param $operationsList 登録用ユーザー操作履歴テーブルのカラム
     * @return array ユーザー操作履歴情報
     */
    // TODO 機能開発優先のため、'operating_user_id'=> 1にしてるが正しくは「'operating_user_id'=> $user->created_user_id」
    private function getUserOperationHistoryData(User $user, int $operationsList) :array
    {
        return [
            'operated_user_id' => $user->id,
            'operating_user_id'=> 1,
            'operation_id' => $operationsList,
            'operated_at' => now(),
        ];
    }

    /**
     * ユーザーモデル登録イベント後処理
     * @param $user 登録されたユーザーインスタンス
     */
    public function created(User $user)
    {
        $attribute= $this->getUserOperationHistoryData($user, OPERATION_TYPE_CREATE);
        UserOperationHistory::createUserOperationHistory($attribute);
    }
}
