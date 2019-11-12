@extends('layouts.user')

@section('title', 'Create Project')

@section('content')

    <h1>Create a new project</h1>

    <form method="POST" action="/projects">
        {{ csrf_field() }}
        <div class="form-group">
        <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control {{ $errors->has('title') ? 'has-error' : '' }}" placeholder="Project Title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'has-error' : '' }}" cols="30" rows="10" placeholder="Project Description">{{ old('description') }}</textarea>        
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    @if($errors->any())

        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>

    @endif

@endsection