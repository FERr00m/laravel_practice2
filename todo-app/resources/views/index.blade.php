@extends('layouts.app')

@section('title', 'The lists of tasks')

@section('content')
    <nav class="mb-4">
        <a class="font-medium text-gray-700 underline decoration-pink-500" href="{{ route('tasks.create') }}">Add Task</a>
    </nav>


    @forelse($tasks as $task)
        <div>
            <a @class(['line-through' => $task->completed]) href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>

            {{ $task->completed }}
        </div>
    @empty
        <div>No Tasks</div>
    @endforelse

    @if($tasks->count())

        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>


    @endif
@endsection

