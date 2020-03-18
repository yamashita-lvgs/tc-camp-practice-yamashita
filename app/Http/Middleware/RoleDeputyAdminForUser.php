<?php
namespace App\Http\Middleware;

use Closure;

/**
 * ユーザーのログインセッションに関するミドルウェア
 * @package App\Http\Controllers
 */
class RoleDeputyAdminForUser
{
    public function handle($request, Closure $next)
    {
        return (session()->has('user_id') ? $next($request) : redirect('login'));
    }
}
