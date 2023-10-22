<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OpenAdminPanelWhenPasswordIsCorrect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $userHasAccessToTheContent = Session::get('userHasAccessToTheContent', false);
        if ($userHasAccessToTheContent === true) {
            return redirect()->route('admin.news.index');
        } else {
            return $next($request);
        }
    }
}
