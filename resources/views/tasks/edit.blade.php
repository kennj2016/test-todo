@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Task') }} # {{ $task->id }}
                    <span class="pull-right">
                        <a href="{{ route('tasks.index') }}" class="btn btn-primary">
                            {{ __('Back') }}
                        </a>
                    </span>
                </div>
                <div class="card-body">

                    <form action="{{ route('tasks.update', $task) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Task') }}</label>
                            <input type="text" name="task" class="form-control" value="{{ $task->task }}">
                        </div>

                        @if($errors->has('task'))

                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('task') }}
                            </div>
                        @endif


                        <div class="row">
                            <div class='col-sm-6'>
                                <div class="form-group">
                                    <input type="datetime-local" value="{{$task->expire_date}}" name="expire_time">
                                </div>
                            </div>
                            @if($errors->has('expire_date'))

                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('expire_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class='col-sm-6'>
                                <div class="form-group">
                                    <select name="status" id="">

                                        <option @if($task->is_completed) selected @endif value="1">Completed</option>
                                        <option @if(!$task->is_completed) selected @endif value="0">Pending</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
