@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            {{ $author->first }}{{ $author->last }}
        </div>
    </div>
@endsection