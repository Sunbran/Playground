<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function show($id)
    {
        $task = 'Task '.$id;

        return view('task', compact('task'));
    }
}
