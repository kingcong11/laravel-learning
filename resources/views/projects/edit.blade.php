@extends('layouts.user')

@section('title', 'Edit Project')



@section('content')
    <h1 class="title">Edit form here</h1>

        <form method="POST" action="/projects/{{ $project->id }}">

            @method('PATCH')
            @csrf

            <div class="field form-group">

                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $project->title }}">

            </div>

            <div class="field form-group">

                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control" value="{{ $project->description }}">

            </div>




            @include('errors.errors-section')

            <div class="field form-group">
                <button type="submit" id="submit" class="btn btn-primary">Update Project</button>
                <button type="submit" form="delete" class="btn btn-danger">Delete</button>
            </div>
            

        </form>


        <form action="/projects/{{ $project->id }}" method="post" id="delete">

            @method('DELETE')
            @csrf

        </form>

@endsection