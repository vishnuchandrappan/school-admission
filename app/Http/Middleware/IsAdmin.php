<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserType;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (UserType::where('name', 'admin')->first()
            ->users()->where('id', Auth::user()->id)->exists()
        ) {
            return $next($request);
        }
        return response()->json([
            'message' => 'Unauthorized',
        ], 403);
    }
}
