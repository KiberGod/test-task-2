@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-md-8">
            @if ($tasks->lastPage() > 1)
                <br>
                <nav>
                    <ul class="pagination">
                        @foreach ($tasks->getUrlRange(1, $tasks->lastPage()) as $page => $url)
                            <li class="page-item {{ ($tasks->currentPage() == $page) ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            @endif
        </div>
        <div class="col-md-4">
            <a href="/tasks/create" class="btn btn-primary" role="button">Створити нову задачу</a>
        </div>
    </div>

    @if(count($tasks))
        <br>
        <div class="card">
            <div class="card-header">
                Список задач користувача {{ Auth::user()->name }}
            </div>

            @foreach($tasks as $task)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><a href="/tasks/view/{{$task->id}}" class="card-link">{{$task->title}}</a></h5>
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
                        <div class="coll-md-2">
                            <div class="card-body">
                                <a href="/tasks/edit/{{$task->id}}" class="btn btn-outline-primary" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"></path>
                                    </svg>
                                    Редагувати
                                </a>
                            </div>
                        </div>
                        <div class="coll-md-2">
                            <div class="card-body">
                                <form action="/tasks/edit/{{$task->id}}" method="post">
                                    {{csrf_field()}}
                                    {!! method_field('delete') !!}
                                    <button type="submit" class="btn btn-outline-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                        Видалити
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div>Задачі відсутні</div>
    @endif

@endsection
