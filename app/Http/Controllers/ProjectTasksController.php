<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class ProjectTasksController extends Controller
{

    private $task;

    public function __construct(){
        $this->task = new Task();
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Project $project)
    {
        $project->addTask(request()->all());

        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Task $task)
    {

        $task->update([
            'completed' => $request->has('completed')
        ]);
        
        return back();
    }

    public function destroy($id)
    {
        
    }
}
