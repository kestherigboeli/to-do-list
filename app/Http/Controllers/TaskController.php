<?php

namespace App\Http\Controllers;

use App\Enum\StatusType;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('tasks', [
            'tasks' => Task::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(TaskRequest $request)
    {
        Task::create($request->toArray());

        return redirect('/')->with('success','Task created successfully!');;
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function completeTask(Task $taskId)
    {
        $taskId->update(['status' => StatusType::COMPLETED]);

        return redirect('/')->with('success','Task completed successfully!');;
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function deleteTask(Task $taskId)
    {
        $taskId->delete();
        return redirect('/')->with('success','Task deleted successfully!');;
    }

}
