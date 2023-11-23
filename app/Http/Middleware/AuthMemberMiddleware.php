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

        if (!$user || session('user_token') == '0' || session('user_token') == null) {
            return redirect('/login')->withErrors(['error' => 'Login Terlebih dahulu']);
        }

        if (getDataMember()->status != 1 || getDataMember()->password_expire <= date('Y-m-d')) {
            if (!str_contains($request->url(), '/member/reset-password')) {
                return redirect('/member/reset-password')->with(session()->flash('error','Sulahkan Ubah Password Anda Terlebih Dahulu'));
            }
        }

      

        return $next($request);
    }
}
