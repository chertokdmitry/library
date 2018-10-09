@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            New author
        </div>
        <div>
            <form method="POST" action="/authors">
                @csrf
                <label for="first">first</label>
                <input type="text"
                       class="form-control"
                       id="first"
                       name="first"
                       placeholder=" first">
                <br><br>
                <label for="last">last</label>
                <input type="text"
                       class="form-control"
                       id="last"
                       name="last"
                       placeholder=" last">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection