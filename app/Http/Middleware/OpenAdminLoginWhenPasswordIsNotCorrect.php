<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OpenAdminLoginWhenPasswordIsNotCorrect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $expectedUsername = env('USERNAME');
        $expectedPassword = env('PASSWORD');

        if ($request->input('username') !== $expectedUsername || $request->input('password') !== $expectedPassword) {
            return redirect()->route('admin.login');
        } else {
        return $next($request);
        }
    }
}