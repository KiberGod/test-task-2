@extends('layouts.layout')

@section('content')


    <div class="card">
        <div class="card-header">
            Редагування заачі {{$task->title}}
        </div>


        <div class="card-body">
            <form action="/tasks/edit/{{$task->id}}" method="post" enctype='multipart/form-data'>

                {{csrf_field()}}
                {!! method_field('patch') !!}

                <div class="form-group">
                    <label for="title"><h6>Назва:</h6></label>
                    <input class="form-control cat-name-input" type="text" name="title" id="title" value="{{$task->title}}">
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Опис</span>
                    </div>
                    <textarea class="form-control" name="description" id="description" >{{$task->description}}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-1">
                        Статус:
                    </div>
                    <div class="col-md-2">
                        <input type="radio" id="option1" name="execution_status" value="1" {{ $task->execution_status ? 'checked' : '' }}>
                        <label for="option1">Виконано</label>
                    </div>
                    <div class="col-md-2">
                        <input type="radio" id="option2" name="execution_status" value="0" {{ !$task->execution_status ? 'checked' : '' }}>
                        <label for="option2">Не виконано</label>
                    </div>
                </div>


                <br>
                <br>
                <div class="form-group">
                    <button class="btn btn-outline-primary" type="submit">Зберегти</button>
                </div>
                @include('layouts.error')

            </form>
        </div>
    </div>
@endsection
