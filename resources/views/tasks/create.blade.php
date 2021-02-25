@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Create A New Task') }}
                    <span class="pull-right">
                        <a href="{{ route('tasks.index') }}" class="btn btn-primary">
                            {{ __('Back') }}
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Task') }}</label>
                            <input type="text" name="task" class="form-control">
                        </div>

                        @if($errors->has('task'))

                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('task') }}
                            </div>
                        @endif


                        <div class="row">
                            <div class='col-sm-6'>
                                <label>Due Date</label>
                                <div class="form-group">

                                    <input type="datetime-local"  name="expire_time">
                                </div>

                                @if($errors->has('expire_time'))

                                    <div class="alert alert-danger" role="alert">
                                        {{ $errors->first('expire_time') }}
                                    </div>
                                @endif
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
