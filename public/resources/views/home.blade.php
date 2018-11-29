@extends('admin.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <br><br>
                @isset($message)
                    <br><br>
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endisset
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Общая статистика</span>
        </h6>
        <br>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                Всего книг: {{ $books_amount }}
            </li>
            <li class="nav-item">
                Всего авторов: {{ $authors_amount }}
            </li>
        </ul>
    </main>
@endsection
