<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if ($user->role != $role) {
            return $next($request);
        }
        if ($user->role == 'admin') {
            return redirect('dashboard.admin');
        } else if ($user->role == 'superadmin') {
            return redirect('dashboard.superadmin');
        } else if ($user->role == 'user') {
            return redirect('dashboard.user');
        }
    }
}
