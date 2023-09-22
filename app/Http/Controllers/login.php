<?php

namespace App\Http\Controllers;

class login extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function checkPassword(Request $request)
    {
        if ($request->has('password') && $request->get('password') == 1) {
            Session::put('valid_password', true);

            return 'Password is valid. You can now access protected content.';
        } else {
            return redirect()->back()->with('error', 'Invalid password. Please try again.');
        }
    }
}
