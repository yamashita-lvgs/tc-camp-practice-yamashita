<?php
namespace App\Observers;

use App\Models\User;
use App\Models\UserOperationHistory;

/**
 * ユーザーモデル用のオブザーバークラス
 * @package App\Observers
 */
class UserObserver
{
    /**
     * ユーザーモデル登録イベント後処理
     * @param User $user 登録されたユーザーインスタンス
     */
    public function created(User $user)
    {
        $attribute= $this->getUserOperationHistoryData($user, OPERATION_TYPE_CREATE);
        UserOperationHistory::create($attribute);
    }

    /**
     * ユーザーモデル更新イベント後処理
     * @param User $user 更新されたユーザーインスタンス
     */
    public function updated(User $user)
    {
        $attribute= $this->getUserOperationHistoryData($user, OPERATION_TYPE_UPDATE);
        UserOperationHistory::create($attribute);
    }

    /**
     * ユーザーモデル削除イベント後処理
     * @param User $user 削除されたユーザーインスタンス
     */
    public function deleted(User $user)
    {
        $attribute= $this->getUserOperationHistoryData($user, OPERATION_TYPE_DELETE);
        UserOperationHistory::create($attribute);
    }

    /**
     * ユーザー操作履歴登録用データを取得
     * @param User $user 登録用ユーザーテーブルのカラム
     * @param int $operationId 登録用ユーザー操作履歴テーブルのカラム
     * @return array ユーザー操作履歴情報
     */
    // TODO 機能開発優先のため、'operating_user_id'=> 1にしてるが正しくは「'operating_user_id'=> $user->created_user_id」
    private function getUserOperationHistoryData(User $user, int $operationId) :array
    {
        $insertList = [
            'operated_user_id' => $user->id,
            'operation_id' => $operationId,
            'operated_at' => now(),
            'created_user_id' => $user->id,
            'created_at' => $user->created_at,
            'updated_user_id' => $user->id,
            'updated_at' => $user->updated_at,
            'deleted_user_id' => $user->id,
            'deleted_at'  => now(),
        ];
        if ($operationId === 1) {
            $insertList['operating_user_id'] = $user->created_user_id;
        } else if ($operationId === 2) {
            $insertList['operating_user_id'] = $user->updated_user_id;
        } else if ($operationId === 3) {
            $insertList['operating_user_id'] = $user->deleted_user_id;
        }
        return $insertList;
    }
}
