<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OpenAdminPanelWhenPasswordIsCorrect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $expectedUsername = env('USERNAME');
        $expectedPassword = env('PASSWORD');

        if ($request->input('username') === $expectedUsername && $request->input('password') === $expectedPassword) {
            return redirect()->route('admin.news.index');
        } else {
        return $next($request);
        }
    }
}