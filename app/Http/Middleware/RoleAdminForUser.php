<?php
namespace App\Http\Middleware;

use App\Models\User;
use Auth;
use Closure;

/**
 * ユーザーのログインセッションに関するミドルウェア
 * @package App\Http\Controllers
 */
class RoleAdminForUser
{
    public function handle($request, Closure $next)
    {
        $userId = session()->get('user_id');
        $user = User::getUserByUserId($userId);

        if ($user->role->sort <= 10) {
            return $next($request);
        } elseif ($user->role->sort <= 20) {
            return redirect('users');
        } else {
            return redirect('/');
        }
    }
}
