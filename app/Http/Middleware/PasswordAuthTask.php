<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PasswordAuthTask
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $password = $request->input('password');
        $request->session()->put('password', $password);
        $expectedPass = '123';

        if (($password === $expectedPass) || ($password === null || $password === '')) {
            if ($password === $expectedPass) {
                $request->session()->put('password', $password);
            }

        } else {
            return redirect('noaccess');
        }

        return $next($request);
    }
}
