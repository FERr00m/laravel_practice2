@extends('layouts.app')

@section('title', isset($task) ? 'Edit task' : 'Add task')

@section('content')

    <form method="post" action="{{ isset($task) ? route('tasks.update', [$task->id]) : route('tasks.store') }}">
        @csrf

        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label>
                title
                <input type="text" name="title" value="{{ $task->title ?? old('title')}}">
            </label>
            @error('title')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>
                descr
                <input type="text" name="description" value="{{ $task->description ?? old('description')}}">
            </label>
            @error('description')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>
                long_description
                <textarea name="long_description" id="" cols="30" rows="10">{{ $task->long_description ?? old('long_description')}}</textarea>
            </label>
            @error('long_description')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn" type="submit">
            @isset($task)
                Update Task
            @else
                Add Task
            @endisset
        </button>
    </form>
@endsection
