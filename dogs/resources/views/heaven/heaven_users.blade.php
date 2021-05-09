@extends('heaven.heaven')

@section('users')
    @foreach($users as $user)
        <div class="d-flex flex-center align-items-center">
            <tr>
                <td>
                    {{ $user->id }}<br/>
                </td>
                <td>
                    {{ $user->name }}<br/>
                </td>
                <td>
                    {{ $user->email }}<br/>
                </td>
                <td>
                    @if($user->role==1)
                        Admin
                    @else
                        Użytkownik
                    @endif
                </td>
                <td class="d-flex justify-content-end">
                    <div class="p-1">
                        @if($user->role==1)
                            <form action="{{ route('heaven.users.edit.role', $user->id) }}" method="POST">
                                @csrf
                                <input type="text" id="role" name="role" value="0" hidden>
                                <button class="btn btn-danger">Odbierz admina</button>
                            </form>
                        @else
                            <form action="{{ route('heaven.users.edit.role', $user->id) }}" method="POST">
                                @csrf
                                <input type="text" id="role" name="role" value="1" hidden>
                                <button class="btn btn-success">Nadaj admina</button>
                            </form>
                        @endif
                    </div>
                    <div class="p-1">

                        <form action="{{ route('heaven.users.edit', $user->id) }}" method="GET">
                            @csrf
                            <button class="btn btn-primary">Edytuj</button>
                        </form>
                    </div>
                    <div class="p-1">
                        <form action="{{ route('heaven.users.destroy', $user->id) }}" method="POST">
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
                <h5>Zarządzaj użytkownikami<br/></h5>
                <a href="{{ route('heaven.index') }}"><- wróć do nieba</a>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="">
                    <form action="{{ route('heaven.users.create') }}" method="GET">
                        @csrf
                        <button class="btn btn-success">Dodaj Urzytkownika</button>
                    </form>
                    <table class="table table-hover">
                        <tr>
                            <td>Id</td>
                            <td>Nazwa</td>
                            <td>email</td>
                            <td>Rola</td>
                            <td class="d-flex justify-content-center">Akcje</td>

                        </tr>
                        @yield('users')
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
