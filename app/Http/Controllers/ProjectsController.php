<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    private $project;

    public function __construct(){
        $this->project = new Project();
    }

    public function index()
    {

        $projects = Project::all();

        $data = [
            'projects' => $projects
        ];

        return view('projects/index', $data);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        
        $this->project->title = request('title');
        $this->project->description = request('description');

        $this->project->save();

        return redirect('/projects');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
