@extends('layouts.app')

@section('content')
            <div class="content">
                <div class="title m-b-md">
                    Books
                </div>

                <div>
                    <table>
                        <tr>
                            <td>
                                <a href="/books/create">
                                    <button type="button" class="btn btn-warning">+ add</button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author ID</th>
                            <th>Delete</th>
                        </tr>

                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>
                                <a href="/books/{{ $book->id }}/edit">
                                {{ $book->title }}
                                </a>
                            </td>
                            <td>{{ $book->author_id }}</td>
                            <td>
                                <form action="{{url('books', [$book->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="X"/>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </table>
                </div>
            </div>
@endsection
