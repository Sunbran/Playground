<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display the login form.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('admin.login');
    }

    /**
     * Process the login form submission.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Display the logout form.
     *
     * @return \Illuminate\View\View
     */
    public function logout()
    {
        return view('admin.login');
    }

    /**
     * Process the logout form submission.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutSubmit()
    {
        Session::forget('userHasAccessToTheContent');

        return redirect()->route('admin.login');
    }
}
