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
                
            <div>
                <form method="POST" action="/tasks/{{ $task->id }}">

                    @method('PATCH')
                    @csrf

                    <label for="task{{ $task->id }}" class="{{ $task->completed ? 'task-completed' : '' }}">
                        <input type="checkbox" class="completed" name="completed" id="task{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                        {{ $task->task_name }}
                    </label>

                </form>
            </div>

            @endforeach
        </div>
        
    @endif

        <br>
        <div>
            <form action="/projects/{{ $project->id }}/tasks" method="POST">

                @csrf
                <h3>New Task</h3>
                <div class="form-group">
                    <label for="">Task Name</label>
                    <input type="text" name="task_name" id="task_name" class="form-control" placeholder="Task name">
                </div>
                <div class="form-group">
                    <label for="">Task Description</label>
                    <input type="text" name="task_description" id="task_description" class="form-control" placeholder="Task description">
                </div>
                
                <button type="submit" id="new-task" class="btn btn-success">Create New Task</button>
            </form>
        </div>

    
    <br><br><hr>


    <div class="actions">
        <a href="/projects/{{ $project->id }}/edit">
            <button type="button" id="edit" class="btn btn-warning">Edit</button>
        </a>
    </div>

@endsection


@section('script')
    <script>
        $(document).ready(function(){
            $("body").on('change', '.completed', function(e){
                console.log($(this)[0].form.submit());
            });
        });
    </script>
@endsection