<?php
namespace App\Http\Middleware;

use Closure;

class UserLoginSession
{
    public function handle($request, Closure $next)
    {
//        if (!session()->has('user_id')) {
//            redirect('/login');
//        }
        
        return $next($request);
    }
}
