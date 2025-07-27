<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

        $tasks = auth()->user()
            ->tasks()
            ->search($search)
            ->filterByStatus($status)
            ->paginate(5)
            ->withQueryString(); // Keeps search term in pagination links

        return view('tasks.index', ['tasks' => $tasks, 'search' => $search, 'status' => $status]);
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
    public function store(StoreTaskRequest $request)
    {
        $validatedData = $request->validated();

        $task = auth()->user()->tasks()->create($validatedData);

        return to_route('tasks.index')->with('message', "$task->title create successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        Gate::authorize('editTask', $task);

        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        Gate::authorize('editTask', $task);

        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        Gate::authorize('editTask', $task);

        $validatedData = $request->validated();

        $task->update($validatedData);

        return to_route('tasks.show', $task)->with('message', "$task->title update successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
         Gate::authorize('editTask', $task);

         $task->delete();

         return to_route('tasks.index')->with('message', "$task->title deleted successfully");
    }
}
