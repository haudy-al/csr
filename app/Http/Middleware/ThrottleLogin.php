<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class ThrottleAdminLogin
{
    protected $limiter;

    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function handle($request, Closure $next, $maxAttempts = 3, $decayMinutes = 1)
    {
        if ($this->limiter->tooManyAttempts($this->throttleKey($request), $maxAttempts, $decayMinutes)) {
            return $this->buildResponse($maxAttempts, $decayMinutes);
        }

        $response = $next($request);

        if ($response->getStatusCode() == 401) {
            $this->limiter->hit($this->throttleKey($request), $decayMinutes);
        }

        return $response;
    }

    protected function throttleKey($request)
    {
        return mb_strtolower($request->input('username')) . '|' . $request->ip();
    }

    protected function buildResponse($maxAttempts, $decayMinutes)
    {
        $retryAfter = $this->limiter->availableIn($this->throttleKey(request()));

        return response()->json([
            'message' => 'Too many login attempts. Please try again after ' . $retryAfter . ' seconds.',
            'retryAfter' => $retryAfter,
        ], Response::HTTP_TOO_MANY_REQUESTS);
    }
}
