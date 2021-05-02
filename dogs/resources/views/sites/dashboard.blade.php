@extends('layouts.app')

@section('title')
    Dogs House - Tablica
@endsection

@section('dashboard')
    @foreach($notices as $notice)
        <div class="notice">
            <div class="links flex-center">
                <img src="/img/doghouse.png" width="140px" height="100px">
                <a href="http://127.0.0.1:8000/notices/{{ $notice->id }}/">
                    {{ $notice->title }}
                </a>
                <a href="http://127.0.0.1:8000/notices/edit/{{ $notice->id }}/">
                    Edytuj
                </a>
                <form action="/notices/{{ $notice->id }}/" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Usuń</button>
                </form>

            </div>
        </div>
    @endforeach
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Twoja tablica ogłoszeń') }}<br/></h5>
                        <a href="http://127.0.0.1:8000/notices/creat/">+Dodaj nowe ogłoszenie</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @yield('dashboard')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
