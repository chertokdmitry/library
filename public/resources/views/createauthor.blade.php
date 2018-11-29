@extends('admin.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h3 style="margin-top:50px;">
            <span>Добавить автора</span>
        </h3>
        <div>
            <form method="POST" action="/admin_authors">
                @csrf
                <label for="first">Имя</label>
                <input type="text"
                       class="form-control"
                       id="first"
                       name="first">
                <br><br>
                <label for="last">Фамилия</label>
                <input type="text"
                       class="form-control"
                       id="last"
                       name="last">
                <br>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </main>
@endsection