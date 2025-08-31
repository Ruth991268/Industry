@extends('layouts.app')

@section('content')
<h3>All Tasks</h3>
<a href="{{ route('tasks.create') }}" class="btn">+ New Task</a>
<hr>

@if($tasks->count())
    <ul>
        @foreach($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong> ({{ $task->subtasks_count }} subtasks)
                @if($task->description) - {{ $task->description }} @endif
            </li>
        @endforeach
    </ul>
    {{ $tasks->links() }}
@else
    <p>No tasks found. Add one!</p>
@endif
@endsection
