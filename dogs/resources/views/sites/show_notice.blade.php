@extends('layouts.app')

@section('title')
    Ogłoszenia - {{ $notices->user }}
@endsection

@section('reply')
    <form action="/reply/" method="POST"> <br>
        @csrf
        <input type="hidden" id="receiver_id" name="receiver_id" value="{{ $notices->user_id }}">
        <input type="hidden" id="notice_id" name="notice_id" value="{{ $notices->id }}">
        <label for="description">Odpowiedz na ogłoszenei: </label> <br>
        <input type="text" id="reply" name="reply"> <br>
        <input type="submit" value="Wyślij">
    </form>
@endsection


@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">

            <div>
                <img src="/img/doghouse.png" width="420px" height="300px"><br/>
                <h1>{{ $notices->title }}</h1>
                <div class="detail">
                    <div class="">
                        Użytkownik: {{ $notices->user }}
                    </div>
                    <div class="info">
                        Imie: {{ $notices->name }} - Gatunek: {{ $notices->type }} - Rasa: {{ $notices->race }} - Wiek: {{ $notices->age }}<br/>
                        Data: {{ $notices->date }} - Lokalizacja: {{ $notices->location }} - Wynagrodzenie: {{ $notices->price }}zł
                    </div>
                    <div class="description">
                        Opis:<br/>
                        {{ $notices->description }}
                    </div>
                </div>
                @guest
                    <p>Żyby móc odpowiedzieć na to gołoszenie musisz sie <a href="http://127.0.0.1:8000/login">zalogować</a></p>
                @else
                    @yield('reply')
                @endguest
            </div>
        </div>
    </div>
@endsection
