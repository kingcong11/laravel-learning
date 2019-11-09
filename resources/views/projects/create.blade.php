@extends('layouts.user')

@section('title', 'Create Project')

@section('content')

    <h1>Create a new project</h1>

    <form method="POST" action="/projects">
        {{ csrf_field() }}
        <div>
            <input type="text" name="title" placeholder="Project Title">
        </div>

        <div>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Project Description"></textarea>        
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection