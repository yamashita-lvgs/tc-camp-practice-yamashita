<?php
namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

/**
 * Observes the Users model
 */
class UserObserver
{
    /**
     * Function will be triggerd when a user is updated
     *
     * @param Users $model
     */
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
        $attribute= $this->userOperationHistoryData($user, OPRATION_CREATE);
        UserActionHistory::create($attribute);
    }
}

