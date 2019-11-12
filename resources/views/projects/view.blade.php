@extends('layouts.user');

@section('title', $project->title)


@section('content')

    <h1>{{ $project->title }}</h1>

    <div class="content">
        <p>{{ $project->description }}</p>
    </div>


    <br><br><hr>


    <div class="actions">
        <a href="/projects/{{ $project->id }}/edit">
            <button type="button" id="edit" class="btn btn-success">Edit</button>
        </a>
    </div>

@endsection