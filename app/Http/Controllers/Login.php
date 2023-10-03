<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $password = $request->input('password');
        $expectedPass = config('content.password');
        if (! empty($expectedPass) and $password === $expectedPass) {
            Session::put('userHasAccessToTheContent', true);

            return redirect()->route('content.index');
        } else {
            return redirect()->route('login.index');
        }
    }
}
