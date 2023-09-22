<?php

namespace App\Http\Controllers;

class TaskController extends Controller
{
    public function show($id)
    {
        $task = 'Task '.$id;

        return view('task', compact('task'));
    }
}
