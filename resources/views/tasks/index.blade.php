@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @forelse($tasks as $task)
        <div class="col-md-3 pb-3">
            <div class="card">
                <div class="card-header">{{ str_limit($task->task, 160) }}</div>

                <div class="card-body" style="height: 200px">
                    Due Date : {{ date('Y-m-d  H:i', strtotime($task->expire_time)) }}

                    <hr>
                    Status : {{$task->status}}
                </div>
                
                <div class="card-footer">

                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-pencil"></i> {{ __('Edit') }}
                    </a>
                    <a href="javascript:;" class="btn btn-danger btn-sm" onclick="document.getElementById('task-{{$task->id}}').submit();">
                        <i class="fa fa-trash"></i> {{ __('Delete') }}
                    </a>
                    <form id="task-{{$task->id}}" action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>

                </div>
            </div>
        </div>


        @endforeach


        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">{{ __('Create A New Task') }}</a>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
