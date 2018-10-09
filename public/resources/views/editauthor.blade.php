@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Update author: {{ $author->fisrt }} {{ $author->last }}
        </div>
        <div>
            <form method="POST" action="/authors/{{ $author->id }}">
                @csrf
                @method('PUT')
                <label for="first">first</label>
                <input type="text"
                       class="form-control"
                       id="first"
                       name="first"
                       placeholder=" first"
                       value="{{ $author->first }}">
                <br><br>
                <label for="last">last</label>
                <input type="text"
                       class="form-control"
                       id="last"
                       name="last"
                       placeholder=" last"
                       value="{{ $author->last }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection