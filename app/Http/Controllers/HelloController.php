<?php

namespace App\Http\Controllers;

use App\Services\MyService;

class HelloController extends Controller
{
    public function index(MyService $service)
    {
        $name = $service->calculatorName();
        return 'Greetings ' . $name;
    }
}
