@extends('layouts.app')

@section('title', $task->title)


@section('content')


    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm">Created: {{ $task->created_at->diffForHumans() }} 🤢 Updated: {{ $task->updated_at->diffForHumans() }}</p>

    <div class="mb-4">
        @if($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not Completed</span>
        @endif
    </div>

    <div class="flex gap-3">
        <a class="btn" href="{{ route('tasks.edit', $task) }}">Edit</a>

        <div>
            <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
                @csrf
                @method('PUT')
                <button class="btn">
                    @if($task->completed)
                        Uncomplete
                    @else
                        Complete
                    @endif
                </button>


            </form>
        </div>

        <div>
            <form method="post" action="{{ route('tasks.destroy', $task) }}">
                @csrf
                @method('delete')
                <button class="btn" type="submit">delete task</button>
            </form>

        </div>
    </div>

@endsection
