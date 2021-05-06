@extends('layouts.app')

@section('title')
    Dogs House - Tablica
@endsection

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
                    <form action="{{ route('notices.edit', $notice->id) }}" method="GET">
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Tablica<br/></h5>
                        <form action="{{ route('notices.create') }}" method="GET">
                            @csrf
                            <button class="btn btn-success">Dodaj ogłoszenie</button>
                        </form>
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
                                    <td width="90">Autor</td>
                                    <td>Lokacja</td>
                                    <td>Data</td>
                                    <td></td>
                                    <td></td>

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
