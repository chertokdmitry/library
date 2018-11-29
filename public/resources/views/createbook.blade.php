@extends('admin.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h3 style="margin-top:50px;">
            <span>Добавить книгу</span>
        </h3>
        <div>
            <form method="POST" action="/admin_books">
                @csrf
                <label for="title">Название</label>
                <input type="text"
                       class="form-control"
                       id="title"
                       name="title">
                <br><br>
                <label for="author_id">Автор</label>
                <input type="text"
                       class="form-control"
                       id="author_id"
                       name="author_id">
                <br>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </main>
@endsection
