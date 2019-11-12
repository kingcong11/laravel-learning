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

        $data = [
            'projects' => $this->project->all()
        ];

        return view('projects/index', $data);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {

        // Project::create(request()->all()); //serialize approach "make sure that guarded is set to prevent any malicious input"

        $this->project->create([
            'title' => request('title'),
            'description' => request('description')
        ]);

        return redirect('/projects');
    }

    public function show(Project $project)
    {

        /* other data for compact */
        $data = [
            "sample_data" => 1,
            "sample_array" => array(
                'x',
                'y'
            ),
        ];

        return view('projects.view', compact('project', 'data'));
    }

    public function edit(Project $project)
    {   
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {

        $project->update(request()->all());

        return redirect('/projects');
    }

    public function destroy($id)
    {
        $this->project->findOrFail($id)->delete();
        
        return redirect('/projects');
    }
}
