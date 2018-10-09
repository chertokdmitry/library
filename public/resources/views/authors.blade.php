@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Authors
        </div>

        <div>
            <table>
                <tr>
                    <td>
                        <a href="/authors/create">
                            <button type="button" class="btn btn-warning">+ add</button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>First</th>
                    <th>Last</th>
                    <th>Delete</th>
                </tr>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>
                            <a href="/authors/{{ $author->id }}/edit">
                                {{ $author->first }}
                            </a>
                        </td>
                        <td>
                            <a href="/authors/{{ $author->id }}/edit">
                                {{ $author->last }}
                            </a></td>
                        <td>
                            <form action="{{url('authors', [$author->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="X"/>
                            </form>
                        </td>
                    </tr> </p>
                @endforeach
            </table>
        </div>
    </div>
@endsection