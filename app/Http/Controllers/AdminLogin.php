<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminLogin extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginSubmit(Request $request)
    {
        $password = $request->input('password');
        $expectedPass = config('content.password');
        if (! empty($expectedPass) and $password === $expectedPass) {
            Session::put('userHasAccessToTheContent', true);

            return redirect()->route('admin.login');
        } else {
            return redirect()->route('admin.news.index');
        }
    }
}
