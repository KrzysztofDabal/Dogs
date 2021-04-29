@extends('layouts.app')

@section('title')
    Odpowiedź na Ogloszenie
@endsection

@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Formularz Ogłoszenia
            </div>
            <form action="/notices/" method="POST"> <br>
                @csrf
                <label for="description">Wiadomość: </label> <br>
                <input type="text" id="description" name="description" size="50"> <br>
                <input type="submit" value="Dodaj Ogłoszenie">
            </form>
        </div>
    </div>
@endsection
