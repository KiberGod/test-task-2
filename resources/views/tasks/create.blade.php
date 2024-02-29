@extends('layouts.layout')

@section('content')


    <div class="card">
        <div class="card-header">
            Створення нової задачі
        </div>
        <div class="card-body">
            <form action="/tasks/create" method="post" enctype='multipart/form-data'>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title"><h6>Назва:</h6></label>
                    <input class="form-control cat-name-input" type="text" name="title" id="title" value="{{ old('title') }}">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Опис</span>
                    </div>
                    <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                </div>
                <div id="file-upload-container">

                </div>
                <button type="button" id="add-file-input" class="btn btn-primary">Добавить файл</button>
                <div class="form-group">
                    <button class="btn btn-outline-primary" type="submit">Створити</button>
                </div>
                @include('layouts.error')
            </form>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Счетчик для уникальных идентификаторов input[type=file]
                    var fileInputCounter = 1;

                    // Добавление нового input[type=file] при нажатии на кнопку "Добавить файл"
                    $('#add-file-input').click(function() {
                        fileInputCounter++;
                        var newFileInput = '<div class="form-group mt-3"><input type="file" name="files[]" class="file-input" id="file-input-' + fileInputCounter + '"><label class="file-label" for="file-input-' + fileInputCounter + '">Выберите файл</label><button type="button" class="btn btn-danger remove-file-input">Удалить файл</button></div>';
                        $('#file-upload-container').append(newFileInput);
                    });

                    // Удаление input[type=file] при нажатии на кнопку "Удалить файл"
                    $(document).on('click', '.remove-file-input', function() {
                        $(this).parent().remove();
                    });
                });
            </script>
        </div>
    </div>
@endsection
