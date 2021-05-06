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
                <td>
                    {{ $notice->user }}
                </td>
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

                        <div class="">
                            <table class="table table-hover">
                                <tr>
                                    <td></td>
                                    <td>Tytuł</td>
                                    <td width="90">Autor</td>
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
