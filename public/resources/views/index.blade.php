@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <br><br>
        <h2>{{ $header }}</h2>
        {{ $items->links() }}
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Автор</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $book)
                    <tr>
                        <td>{{ $book['id'] }}</td>
                        <td>{{ $book['title'] }}</td>
                        <td>{{ $book->author->first }} {{ $book->author->last }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $items->links() }}
    </main>
@endsection
