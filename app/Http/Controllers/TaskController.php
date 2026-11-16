<?php
namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Mail\TaskCompletedMail;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('is_archived', false)->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        Task::create($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $previousStatus = $task->status;
        $newStatus = $request->input('status');

        $task->update($request->validated());

        if ($previousStatus !== 'done' && $newStatus === 'done') {
            $recipientEmail = auth()->user()->email ?? 'admin@example.com';
            Mail::to($recipientEmail)->send(new TaskCompletedMail($task));
        }

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->update(['is_archived' => true]);
        return redirect()->route('tasks.index')->with('success', 'Task archived successfully.');
    }
}