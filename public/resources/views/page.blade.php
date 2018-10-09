@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Online library
        </div>

        <div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Name</th>
                </tr>

                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book['id'] }}</td>
                        <td>{{ $book['title'] }}</td>
                        <td>{{ $book['author_name'] }}</td>
                    </tr> </p>
                @endforeach
            </table>
        </div>
    </div>
@endsection



