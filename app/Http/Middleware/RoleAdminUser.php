<?php
namespace App\Http\Middleware;

use App\Services\UserService;
use Closure;

/**
 * 管理者のロールに関するミドルウェア
 * @package App\Http\Controllers
 */
class RoleAdminUser
{
    public function handle($request, Closure $next)
    {
        $user = UserService::getUserByUserSession();

        if ($user->role_id <= 1) {
            return $next($request);
        } elseif ($user->role_id <= 2) {
            abort('403', '権限がありません。');
        } else {
            abort('403', '権限がありません。');
        }
    }
}
