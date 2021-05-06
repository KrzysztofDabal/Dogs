@extends('heaven.heaven')

@section('notices')
    @foreach($notices as $notice)
        <a href="{{ route('notices.show', $notice->id) }}"></a>
        <div>
            <tr>
                <td>
                    <a href="{{ route('notices.show', $notice->id) }}">
                        {{ $notice->title }}<br/>
                        <img src="/img/doghouse.png" width="140px" height="100px">
                    </a>
                </td>
                <td>
                    {{ $notice->user }}
                </td>
                <td>
                    {{ $notice->location }}
                </td>
                <td>
                    {{ $notice->date }}
                </td>
                <td>
                    {{ $notice->reward }}zł
                </td>
                <td>
                    {{ $notice->description }}
                </td>
                <td>
                    <form action="{{ route('heaven.notices.edit', $notice->id) }}" method="GET">
                        @csrf
                        <button class="btn btn-primary">Edytuj</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('notices.destroy', $notice->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>
        </div>
    @endforeach
@endsection

@section('content')
    <div class="">
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
                    <table class="table table-hover">
                        <tr>
                            <td width="400px">Tytuł</td>
                            <td width="150px">Autor</td>
                            <td width="150px">Lokalizacja</td>
                            <td width="150px">Czas</td>
                            <td width="150px">Wynagrodzenie</td>
                            <td width="400px">Opis</td>
                            <td></td>
                            <td></td>

                        </tr>
                        @yield('notices')
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
