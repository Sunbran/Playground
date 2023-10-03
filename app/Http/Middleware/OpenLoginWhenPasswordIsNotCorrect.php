<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OpenLoginWhenPasswordIsNotCorrect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userHasAccessToTheContent = Session::get('userHasAccessToTheContent', false);
        if ($userHasAccessToTheContent === false) {
            return redirect()->route('login.index');
        } else {
            return $next($request);
        }
    }
}
