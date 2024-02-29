@extends('layouts.layout')

@section('content')

    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$task->title}}</h5>
                    <p class="card-text">{{$task->description}}</p>
                    <p class="card-text">
                        <small class="text-muted">Статус:
                            @if($task->execution_status)
                                <span class="text-success">Виконано</span>
                            @else
                                <span class="text-danger">Не виконано</span>
                            @endif
                        </small>
                    </p>
                    <p class="text-muted">{{$task->created_at}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
