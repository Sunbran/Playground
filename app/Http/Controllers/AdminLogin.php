<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLogin extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginSubmit(Request $request)
    {
        $expectedUsername = env('USERNAME');
        $expectedPassword = env('PASSWORD');

        if ($request->input('username') === $expectedUsername && $request->input('password') === $expectedPassword) {
            // Set a session variable to indicate access is granted
            session(['userHasAccessToTheContent' => true]);

            return redirect()->route('admin.news.index');
        } else {
            return redirect()->route('admin.login');
        }
    }
}
