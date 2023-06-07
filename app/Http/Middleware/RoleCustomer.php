<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCustomer
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::find(auth()->id());
        if ($user->hasRole(User::CUSTOMER)) {
            return $next($request);
        }
        return abort(403, 'Unauthorized, Access Denied.');
    }
}
