<?php
namespace App\Observers;

use App\Models\User;
use App\Models\UserOperationHistory;

/**
 * Observes the Users model
 */
class UserObserver
{
    private function userOperationHistoryData(User $user, int $operationsList)
    {
        return [
            'operated_user_id' => $user->id,
            'operating_user_id'=> $user->created_user_id,
            'operation_id' => $operationsList,
            'operated_at' => now(),
        ];
    }

    public function create(User $user){
        $attribute= $this->userOperationHistoryData($user, OPERATION_TYPE_CREATE);
        UserOperationHistory::create($attribute);
    }
}
