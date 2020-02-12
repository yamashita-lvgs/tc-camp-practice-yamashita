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
     * ユーザーテーブルとユーザー操作履歴テーブルのカラムの紐つけ
     * @return ユーザー操作履歴テーブルのカラム
     */
    // TODO 機能開発優先のため、'operating_user_id'=> 1,にしてるが正しくは「'operating_user_id'=> $user->created_user_id,」
    private function getUserOperationHistoryData(User $user, int $operationsList)
    {
        return [
            'operated_user_id' => $user->id,
            'operating_user_id'=> 1,
            'operation_id' => $operationsList,
            'operated_at' => now(),
        ];
    }

    /**
     * ユーザーテーブルのデータ追加時と操作履歴テーブルのデータ追加
     * @param $user 登録されたユーザー
     */
    public function created(User $user)
    {
        $attribute= $this->getUserOperationHistoryData($user, OPERATION_TYPE_CREATE);
        UserOperationHistory::createUserOperationHistory($attribute);
    }
}
