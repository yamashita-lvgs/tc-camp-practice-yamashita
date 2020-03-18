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
        $loginId = session()->get('user_id');
        $user = User::getUserByLoginId($loginId);
        return ($user->role == 1) ? $next($request) : redirect('login');
    }
}
