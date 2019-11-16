<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Filesystem\Filesystem;
use App\Services\Twitter;

class ProjectsController extends Controller
{
    private $project;

    public function __construct(){
        $this->project = new Project();

        $this->middleware('auth')->only([
            'create',
            'store',
            'edit',
            'update',
            'destroy'
        ]);
    }

    public function index()
    {

        $data = [
            'projects' => $this->project->where('owner_id', auth()->id())->get()
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

        $validated = request()->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3'
        ]);

        $validated['owner_id'] = auth()->id();

        $this->project->create($validated);

        return redirect('/projects');
    }

    public function show(Project $project, Twitter $twitter)
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
