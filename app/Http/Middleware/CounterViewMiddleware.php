<?php

namespace App\Http\Middleware;

use App\Models\CounterViewModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CounterViewMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        $cek = CounterViewModel::where('ip',$ipAddress)->where('agent',$userAgent)->get()->first();
        
        if (!$cek) {
            CounterViewModel::create([
                'ip'=>$ipAddress,
                'agent'=>$userAgent
            ]);
        }

        return $next($request);
    }
}
