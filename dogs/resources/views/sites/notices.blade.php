@extends('layouts.app')

@section('title')
    Ogłoszenia
@endsection


@section('notices')
    @foreach($notices as $notice)
        <a href="{{ route('notices.show', $notice->id) }}"></a>
        <div>
            <tr>
                <td>
                    <img src="/img/doghouse.png" width="140px" height="100px">
                </td>
                <td>
                    <a href="{{ route('notices.show', $notice->id) }}">{{ $notice->title }}</a>
                </td>
                @foreach($users as $user)
                    @if($user->id == $notice->user_id)
                        <td>{{ $user->name }}</td>
                    @endif
                @endforeach
                <td>
                    {{ $notice->location }}
                </td>
                <td>
                    {{ $notice->date }}
                </td>
            </tr>
        </div>
    @endforeach
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Ogłoszenia<br/></h5>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('notices.index') }}" method="GET">
                            @csrf
                            <button class="btn btn-info">Odświerz</button>
                        </form>
                        <form action="{{ route('notices.filtr') }}" method="POST">
                            @csrf
                            <label>Wyszukaj po lokalizacji</label>
                            <input type="text" id="filtr" name="filtr">
                            <button class="btn btn-info">Wyszukaj</button>
                        </form>

                        <div class="">
                            <table class="table table-hover">
                                <tr>
                                    <td></td>
                                    <td>Tytuł</td>
                                    <td>Autor</td>
                                    <td>Lokacja</td>
                                    <td>Data</td>

                                </tr>
                                @yield('notices')
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
