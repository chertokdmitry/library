@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            New book
        </div>
        <div>
            <form method="POST" action="/books">
                @csrf
                <label for="title">title</label>
                <input type="text"
                       class="form-control"
                       id="title"
                       name="title"
                       placeholder=" title">
                <br><br>
                <label for="author_id">author_id</label>
                <input type="text"
                       class="form-control"
                       id="author_id"
                       name="author_id"
                       placeholder=" author_id">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
