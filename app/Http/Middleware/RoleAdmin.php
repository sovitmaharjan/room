<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::find(auth()->id());
        if ($user->hasRole(User::ADMIN)) {
            return $next($request);
        }
        return abort(403, 'Unauthorized, Access Denied.');
    }
}
