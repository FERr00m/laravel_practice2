@extends('layouts.app')

@section('title', 'Edit task')

@section('content')
    @include('form', ['task' => $task])
@endsection
