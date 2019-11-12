@extends('layouts.user')

@section('title', $project->title)


@section('content')

    <h1>{{ $project->title }}</h1>

    <div class="content">
        <p>{{ $project->description }}</p>
    </div>


    @if ($project->tasks->count())

        <div class="tasks">
            @foreach ($project->tasks as $task)
                <li>{{ $task->task_name }}</li>
            @endforeach
        </div>
        
    @endif

    
    <br><br><hr>


    <div class="actions">
        <a href="/projects/{{ $project->id }}/edit">
            <button type="button" id="edit" class="btn btn-success">Edit</button>
        </a>
    </div>

@endsection