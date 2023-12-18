@extends('layouts.app')

@section('title', 'The Lists of Tasks')

@section('content')
<nav class="mb-4">
    <a class="font-medium text-gray-700 underline decoration-pink-500 underline-offset-2"
        href="{{ route('tasks.create') }}">Create new</a>
</nav>

<ul class="space-y-3">
    @forelse($tasks as $task)
    <li>
        <a @class(['font-bold','line-through font-normal'=> $task->completed]) href="{{ route('tasks.show', ['task' =>
            $task->id])
            }}">{{
            $task->title }}</a>
    </li>
    @empty
    <li>Empty</li>
</ul>
@endforelse
@if ($tasks->count())
<nav class="mt-4">
    {{$tasks->links()}}
</nav>
@endif

@endsection