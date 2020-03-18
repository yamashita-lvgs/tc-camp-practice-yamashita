<?php
namespace App\Http\Middleware;

use Closure;

/**
 * ユーザーのログインセッションに関するミドルウェア
 * @package App\Http\Controllers
 */
class RoleAdminForUser
{
    public function handle($request, Closure $next)
    {
        return ($request->role == 1) ? $next($request) : redirect('login');
    }
}
