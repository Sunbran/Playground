<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginSubmit(Request $request)
    {
        $password = $request->input('password');
        $username = $request->input('username');

        $request->validate(
            [
                'password' => 'required',
                'username' => 'required',
            ]
        );

        $expectedPass = config('admin.password');
        $expectedUser = config('admin.username');
        if ($username === $expectedUser && $password === $expectedPass) {
            Session::put('userHasAccessToTheContent', true);

            return redirect()->route('admin.news.index');
        }

        return redirect()->route('admin.login');
    }
}
