<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Admin::where('id_user', Auth::id())->exists()) {
            return $next($request);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}