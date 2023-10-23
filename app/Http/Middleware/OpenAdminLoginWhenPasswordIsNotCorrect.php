<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OpenAdminLoginWhenPasswordIsNotCorrect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $userHasAccessToTheContent = Session::get('userHasAccessToTheContent', false);
        if ($request->route()->named('admin.login')) {
            return $next($request);
        }
        if ($userHasAccessToTheContent === false && $request->path() !== '/admin/news') {
            return redirect()->route('admin.login');
        } else {
            return $next($request);
        }
    }
}
