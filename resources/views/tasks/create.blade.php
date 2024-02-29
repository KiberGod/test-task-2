@extends('layouts.layout')

@section('content')


    <div class="card">
        <div class="card-header">
            Створення нової задачі
        </div>
        <div class="card-body">
            <form action="/tasks/create" method="post" enctype='multipart/form-data'>

                {{csrf_field()}}
                <div class="form-group">
                    <label for="title"><h6>Назва:</h6></label>
                    <input class="form-control cat-name-input" type="text" name="title" id="title" value="{{old('title')}}">
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Опис</span>
                    </div>
                    <textarea class="form-control" name="description" id="description" >{{old('description')}}</textarea>
                </div>

                <br>
                <br>
                <div class="form-group">
                    <button class="btn btn-outline-primary" type="submit">Створити</button>
                </div>
                @include('layouts.error')

            </form>
        </div>
    </div>
@endsection
