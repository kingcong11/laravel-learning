@extends('layouts.user')

@section('title')

@section('content')
    <h1>Homepage ng Pinas</h1>

    <label for="">List of available tasks</label>
    <ul>
        @foreach($tasks as $task)
            <li> {{ $task }} </li>
        @endforeach
    
    </ul>

    <div id="app">

        <example-component></example-component>

    </div>

@endsection()