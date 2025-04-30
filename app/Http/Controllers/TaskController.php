<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('completed',false)->orderBy('priority', 'desc')->orderBy('due_date')->get();

        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the input
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'priority' => 'required|max:255',
        'due_date' => 'nullable|date|max:255',
    ]);
       // Insert into the database
       Task::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'priority' => $request->input('priority'),
        'due_date' => $request->input('due_date'),
    ]);

    return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        // $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high|max:255',
            'due_date' => 'nullable|date|max:255',
        ]);
    
        // Find the existing task
        $task = Task::findOrFail($id);
    
        // Update the task
        $task->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'priority' => $validated['priority'],
            'due_date' => $validated['due_date'],
        ]);
    
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    // task completed
    public function complete(Task $task)
    {
        $task->update([
            'completed' => true,
            'completed_at' => now(),
        ]);
    
        return redirect()->route('tasks.index')->with('success', 'Task marked as completed!');
    }

    // show completed task
    public function showCompleted()
    {
        $completedTasks = Task::where('completed',true)->orderBy('completed_at','desc')->get();
        
        return view('taskshow',compact('completedTasks'));
    }

}