@extends('heaven.heaven')

@section('users')
    @foreach($users as $user)
        <div>
            <tr>
                <td>
                    <a href="">
                        {{ $user->name }}<br/>
                        <img src="/img/doghouse.png" width="140px" height="100px">
                    </a>
                </td>
                <td>
                    @if($user->role==1)
                        Admin
                    @else
                        Użytkownik
                    @endif
                </td>
                <td>
                    @if($user->role==1)
                        <form action="/notices/edit/role/{{ $user->id }}/" method="POST">
                            @csrf
                            <input type="text" id="role" name="role" value="0" hidden>
                            <button class="btn btn-danger">Odbierz admina</button>
                        </form>
                    @else
                        <form action="/notices/edit/role/{{ $user->id }}/" method="POST">
                            @csrf
                            <input type="text" id="role" name="role" value="1" hidden>
                            <button class="btn btn-success">Nadaj admina</button>
                        </form>
                    @endif
                </td>
                <td>
                    <form action="/notices/edit/{{ $user->id }}/" method="GET">
                        @csrf
                        <button class="btn btn-primary">Edytuj</button>
                    </form>
                </td>
                <td>
                    <form action="/notices/{{ $user->id }}/" method="POST">
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
                            <td>Nazwa</td>
                            <td>Rola</td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        @yield('users')
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
