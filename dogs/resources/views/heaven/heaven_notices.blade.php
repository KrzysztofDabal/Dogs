@extends('heaven.heaven')

@section('notices')
    @foreach($notices as $notice)
        <a href="http://127.0.0.1:8000/notices/{{ $notice->id }}/"></a>
            <div>
                <tr>
                    <td>
                        <a href="http://127.0.0.1:8000/notices/{{ $notice->id }}/">
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
                        {{ $notice->date }}
                    </td>
                    <td>
                        {{ $notice->date }}
                    </td>
                    <td>
                        <form action="/notices/edit/{{ $notice->id }}/" method="GET">
                            @csrf
                            <button class="btn btn-primary">Edytuj</button>
                        </form>
                    </td>
                    <td>
                        <form action="/notices/{{ $notice->id }}/" method="POST">
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Dogo Heaven<br/></h5>
                <a href="{{ route('heaven') }}"><- wróć do nieba</a>
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
                            <td>Tytuł</td>
                            <td>Autor</td>
                            <td>Lokacja</td>
                            <td>Data</td>
                            <td></td>
                            <td></td>
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
