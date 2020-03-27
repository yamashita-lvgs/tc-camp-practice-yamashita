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

        if ($user->role->judgment_role_deputy_admin <= JUDGMENT_ROLE_ADMIN) {
            return $next($request);
        } else {
            abort('403', '権限がありません。');
        }
    }
}
