<?php
namespace App\Http\Middleware;

use App\Models\User;
use Closure;

/**
 * ユーザーのログインセッションに関するミドルウェア
 * @package App\Http\Controllers
 */
class RoleDeputyAdminForUser
{
    public function handle($request, Closure $next)
    {
        $userId = session()->get('user_id');
        $user = User::getUserByUserId($userId);

        if ($user->role->sort <= 20){
            return $next($request);
        } else {
            return redirect('users');
        }
    }
}
