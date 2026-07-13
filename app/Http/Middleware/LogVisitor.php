<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $date = \Carbon\Carbon::today();

        \App\Models\Visitor::firstOrCreate([
            'ip_address' => $ip,
            'visited_date' => $date,
        ], [
            'user_agent' => $request->userAgent(),
        ]);

        return $next($request);
    }
}
