<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Content extends Controller
{
    public function index()
    {
        return view('content');
    }
}
