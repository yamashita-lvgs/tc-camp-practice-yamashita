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
    private function getUserOperationHistoryData(User $user, int $operationId) :array
    {
        $insertList = [
            'operated_user_id' => $user->id,
            'operation_id' => $operationId,
        ];

        switch ($operationId) {
            case OPERATION_TYPE_CREATE:
                $insertList['operating_user_id'] = $user->created_user_id;
                $insertList['operated_at'] = $user->created_at;
                break;
            case OPERATION_TYPE_UPDATE:
                $insertList ['operating_user_id'] = $user->updated_user_id;
                $insertList ['operated_at'] =$user->updated_at;
                break;
            case OPERATION_TYPE_DELETE:
                $insertList ['operating_user_id'] = $user->deleted_user_id;
                $insertList ['operated_at']=$user->deleted_at;
                break;
        }
        return $insertList;
    }
}
