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
                    <th>Имя</th>
                    <th>Фамилия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $author)
                    <tr>
                        <td>{{ $author['id'] }}</td>
                        <td>{{ $author['first'] }}</td>
                        <td>{{ $author['last'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $items->links() }}
    </main>
@endsection
