@extends('heaven.heaven')

@section('notices')
    @foreach($notices as $notice)
        <a href="{{ route('notices.show', $notice->id) }}"></a>
        <div>
            <tr>
                <td>{{ $notice->id }}</td>
                <td>{{ $notice->title }}</td>
                @foreach($users as $user)
                    @if($user->id == $notice->user_id)
                        <td>{{ $user->name }}</td>
                    @endif
                @endforeach
                <td>
                    N: {{ $notice->name }}<br/>
                    R: {{ $notice->race }}<br/>
                    S: {{ $notice->type }}
                </td>
                <td>{{ $notice->reward }}zł</td>
                <td>{{ $notice->location }}</td>
                <td >{{ $notice->date }}</td>
                <td>{{ $notice->description }}</td>
                <td class="d-flex justify-content-end">
                    <div class="p-1">
                        <form action="{{ route('notices.show', $notice->id) }}" method="GET">
                            @csrf
                            <button class="btn btn-info">Pokaż</button>
                        </form>
                    </div>
                    <div class="p-1">
                        <form action="{{ route('heaven.notices.edit', $notice->id) }}" method="GET">
                            @csrf
                            <button class="btn btn-primary">Edytuj</button>
                        </form>
                    </div>
                    <div class="p-1">
                        <form class=p-1" action="{{ route('heaven.notices.destroy', $notice->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Usuń</button>
                        </form>
                    </div>
                </td>
            </tr>
        </div>
    @endforeach
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Dogo Heaven<br/></h5>
                <a href="{{ route('heaven.index') }}"><- wróć do nieba</a>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="">
                    <form action="{{ route('heaven.notices.create') }}" method="GET">
                        @csrf
                        <button class="btn btn-success">Dodaj Ogłoszenie</button>
                    </form>
                    <table class="table table-hover">
                        <tr>
                            <td>Id</td>
                            <td>Tytuł</td>
                            <td>Autor</td>
                            <td>Pies</td>
                            <td>Wynagrodzenie</td>
                            <td>Lokalizacja</td>
                            <td>Data</td>
                            <td>Opis</td>
                            <td class="d-flex justify-content-center">Akcje</td>
                        </tr>
                        @yield('notices')
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
