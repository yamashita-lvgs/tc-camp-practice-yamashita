<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserActionHistory;

class UserService
{
    public static function userIndex()
    {
        return User::all();
    }

    public static function userActionHistoryIndex()
    {
        return UserActionHistory::all();
    }
}


