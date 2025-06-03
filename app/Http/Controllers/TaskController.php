<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of Tasks.
     */
    public function index()
    {
        return view('welcome', [
            'tasks' => Task::all()
        ]);
    }

    /**
     * Show the form for creating a new Task.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created Task in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'state' => 'required',
            'time_estimated' => 'required|numeric|min:0',
        ]);

        // Create a new Task model object, mass-assign its attributes with
        // the validated data and store it to the database
        $task = Task::create($validated);

        // Redirect to the home page
        return redirect()->route('home')
            ->with('success', "Task $task->id is successfully created");
    }

    /**
     * Display the specified Task.
     */
    public function show(Task $task)
    {
        return view('tasks.show', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified Task.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    /**
     * Update the specified Task in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'state' => 'required',
            'time_estimated' => 'required|numeric|min:0',
        ]);

        // Create a new Task model object, mass-assign its attributes with
        // the validated data and store it to the database
        $task->update($validated);

        // Redirect to the home page
        return redirect()->route('home')
            ->with('success', "Task $task->id is successfully created");
    }

    public function complete(Request $request, Task $task)
    {
        $task->complete();

        // Redirect to the tasks.show page
        return redirect()->route('tasks.show', $task)
            ->with('success', "Task $task->id is successfully completed");
    }

    /**
     * Remove the specified Task from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('home')
            ->with('success', "Task $task->id is successfully deleted");
    }
}
