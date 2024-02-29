<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\File;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tasks = $user->tasks()->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        $task = auth()->user()->tasks()->create($request->validated());
        File::uploadFiles($request, $task);
        return redirect('/tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update(Task::mergeRequestData($request));
        return redirect('/tasks');
    }
}
