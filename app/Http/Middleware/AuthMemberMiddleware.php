<?php

namespace App\Http\Middleware;

use App\Models\MemberModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMemberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = MemberModel::where('token',session('user_token'))->get()->first();

        if (!$user) {
            return redirect('/login')->withErrors(['error','Login Terlebihdahulu']);
        }

        if (session('user_token') == '0') {
            return redirect('/login')->withErrors(['error','Login Terlebihdahulu']);
        }

        if (session('user_token') == null) {
            return redirect('/login')->withErrors(['error','Login Terlebihdahulu']);
        }

        return $next($request);
    }
}
