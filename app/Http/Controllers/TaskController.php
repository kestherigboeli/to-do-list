<?php

namespace App\Http\Controllers;

use App\Enum\StatusType;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     *
     */
    public function index()
    {
        return view('tasks', [
            'tasks' => Task::all()
        ]);
    }

    /**
     * Create new task.
     *
     */
    public function create(TaskRequest $request)
    {
        Task::create($request->toArray());

        return redirect('/')->with('success','Task created successfully!');;
    }

    /**
     * Update a task.
     *
     */
    public function completeTask(Task $taskId)
    {
        $taskId->update(['status' => StatusType::COMPLETED]);

        return redirect('/')->with('success','Task completed successfully!');;
    }

    /**
     * Delete a task.
     *
     */
    public function deleteTask(Task $taskId)
    {
        $taskId->delete();
        return redirect('/')->with('success','Task deleted successfully!');;
    }

}
