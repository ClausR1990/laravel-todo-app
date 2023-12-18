@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Taks')

@section('content')
<form class="space-y-3" method="POST"
    action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
    @csrf
    @isset($task)
    @method('put')
    @endisset
    <div class="flex flex-col space-y-2">
        <label class="font-bold" for="title">Title</label>
        <input @class(['border-red-500 placeholder:text-red-500'=> $errors->has('title'), 'border border-gray-500 py-2
        px-4 rounded-md
        leading-none']) type="text" id="title"
        name="title" value="{{$task->title ?? old('title')}}" />
        @error('title')
        <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
    </div>
    <div class="flex flex-col space-y-2">
        <label class="font-bold" for="description">Description</label>
        <textarea @class(['border-red-500 placeholder:text-red-500'=> $errors->has('description'), 'border border-gray-500 py-2 px-4 rounded-md
            leading-none']) id="description" name="description"
            rows="5">{{$task->description ?? old('description')}}</textarea>
        @error('description')
        <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
    </div>
    <div class="flex flex-col space-y-2">
        <label class="font-bold" for="long_description">Long Description</label>
        <textarea @class(['border-red-500 placeholder:text-red-500'=> $errors->has('long_description'), 'border border-gray-500 py-2 px-4 rounded-md
            leading-none']) id="long_description" name="long_description"
            rows="10">{{$task->long_description ?? old('long_description')}}</textarea>
        @error('long_description')
        <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
    </div>
    <div class="flex gap-2">
        <button class="py-3 rounded-md px-5 leading-none bg-slate-600 text-slate-50" type="submit">
            @isset($task)
            Update Task
            @else
            Add task
            @endisset
        </button>
        <a class="py-3 rounded-md px-5 leading-none border border-slate-500"" href=" {{ route('tasks.index')
            }}">Cancel</a>
    </div>
</form>
@endsection