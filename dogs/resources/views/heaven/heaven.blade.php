@extends('layouts.heaven_layout')

@section('title')
    Witamy w psim niebie
@endsection

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Dogo Heaven<br/></h5>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                Witamy w psim niebie<br/>
                Czym chcesz zarządzać<br/>
                <a href="{{ route('heaven.notices.index') }}">Ogłoszenia</a><br/>
                <a href="{{ route('heaven.users.index') }}">Użytkownicy</a><br/>
                @yield('heaven')
            </div>
        </div>
    </div>
@endsection
