<?php

namespace App\Http\Controllers;

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
