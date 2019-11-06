@extends('layouts.user')

@section('title', 'Projects')

@section('content')

    <h1>Manage Projects</h1>

    @foreach($projects as $project)
    
        <li>{{ $project->title }}</li>

    @endforeach()

@endsection