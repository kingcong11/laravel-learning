<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Filesystem\Filesystem;
use App\Services\Twitter;
use App\Mail\ProjectCreated;

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
            // 'projects' => $this->project->where('owner_id', auth()->id())->get()
            'projects' => auth()->user()->projects
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

        $validated = $this->validateProject();

        $validated['owner_id'] = auth()->id();

        $newProject = $this->project->create($validated);

        \Mail::to($newProject->owner->email)->send(
            new ProjectCreated($newProject)
        );

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

        abort_unless(\Gate::allows('update', $project), 403);

        return view('projects.view', compact('project', 'data'));
    }

    public function edit(Project $project)
    {   
        abort_unless(\Gate::allows('update', $project), 403);
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {

        abort_unless(\Gate::allows('update', $project), 403);

        $validated = $this->validateProject();

        $project->update($validated);

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        
        abort_unless(\Gate::allows('update', $project), 403);
        $this->project->findOrFail($project->id)->delete();
        
        return redirect('/projects');
    }

    private function validateProject(){
        return request()->validate([
                    'title' => 'required|min:3',
                    'description' => 'required|min:3'
              ]);
    }


}
