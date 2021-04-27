@extends('layouts.app')

@section('title')
    Ogłoszenia - {{ $notices->user }}
@endsection

@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">

            <div>
                    <img src="/img/doghouse.png" width="420px" height="300px">
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
                        <form action="/notices/{{ $notices->id }}/" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Usuń Ogłoszenie</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
