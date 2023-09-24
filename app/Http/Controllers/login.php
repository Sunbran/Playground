<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class login extends Controller
{
    public function show()
    {
        if (Session::has('password') && Session::get('password') === '123') {
            return view('content');
        }

        return view('login');
    }

    public function checkPass(Request $request)
    {
        $password = $request->input('password');
        $expectedPass = '123';
        if (Session::has('password') && $password === $expectedPass) {
            return view('content');
        } else {
            return view('noaccess');
        }
    }
}
