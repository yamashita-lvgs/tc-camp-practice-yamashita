<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserService
{
    public static function index()
    {
        return User::all();
    }
}
