@extends('layouts.user')

@section('title', 'Projects')

@section('content')

    <h1>Manage Projects</h1>
    
    <ul>
        @foreach($projects as $project)
        
            <li><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></li>

        @endforeach()
    </ul>

    <hr>

    <div class="actions">
        <a href="/projects/create">
            <button type="button" id="edit" class="btn btn-success">New Project</button>
        </a>
    </div>

@endsection