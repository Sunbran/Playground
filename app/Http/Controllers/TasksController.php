<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = [
            'Dishes',
            'Homework',
            'Practice',
        ];

        return view('tasks', compact('tasks'));

    }
}
