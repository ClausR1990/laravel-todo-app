@extends('layouts.app')

@section('title', $task->title)

@section('content')
<div class="space-y-3 text-slate-700">
    <a class="font-medium text-gray-700 underline decoration-pink-500 underline-offset-2"
        href="{{ route('tasks.index') }}">Go back</a>
    <p>{{$task->description}}</p>

    @if ($task->long_description)
    <p>{{$task->long_description}}</p>
    @endif

    <p>{{$task->created_at}}</p>
    <p>{{$task->updated_at}}</p>

    <p>
        @if ($task->completed)
        <span class="font-medium text-green-500">Completed</span>
        @else
        <span class="text-red-500">Not completed</span>
        @endif
    </p>
    <div>
    </div>
    <div class="flex gap-3">
        <form method="POST" action="{{ route('task.toggle-complete', ['task'=>$task]) }}">
            @csrf
            @method('PUT')
            <button class="py-3 rounded-md px-5 leading-none border border-slate-500" type="submit">Mark as {{
                $task->completed ? 'not completed' : 'completed' }}</button>
        </form>
        <a class="py-3 rounded-md px-5 leading-none bg-slate-600 text-slate-50"
            href="{{route('tasks.edit', ['task' => $task])}}">Edit</a>
        <form method="POST" action="{{route('tasks.destroy', ['task' => $task])}}">
            @csrf
            @method('delete')
            <button class="py-3 rounded-md px-5 leading-none bg-red-900 text-red-50" type="submit">Delete
                task</button>
        </form>
    </div>
</div>
@endsection