@extends('layouts.app')

@section('title')
    Dodaj Ogłoszenie
@endsection

@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Formularz Ogłoszenia
            </div>
            <form action="/create/" method="POST"> <br>
                @csrf
                <label for="name">Tytul ogłoszenia: </label> <br>
                <input type="text" id="title" name="title"> <br>
                <label for="name">Imię Psa: </label> <br>
                <input type="text" id="name" name="name"> <br>
                <label for="type">Rodzaj Psa: </label> <br>
                <label><input type="radio" id="type" name="type" value="tiny" checked>Malutki</label>
                <label><input type="radio" id="type" name="type" value="small">Mały</label>
                <label><input type="radio" id="type" name="type" value="medium">Średni</label>
                <label><input type="radio" id="type" name="type" value="big">Duży</label>
                <label><input type="radio" id="type" name="type" value="huge">Ogromny!!</label><br/>
                <label for="race">Rasa Psa: </label> <br>
                <input type="text" id="race" name="race"> <br>
                <label for="age">Wiek Psa: </label> <br>
                <input type="number" id="age" name="age"> <br>
                <label for="price">Cena: </label> <br>
                <input type="number" id="reward" name="reward"> <br>
                <label for="date">Data: </label> <br>
                <input type="date" id="date" name="date"> <br>
                <label for="time">Godzina: </label> <br>
                <input type="time" id="time" name="time"> <br>
                <label for="location">Lokalizacja: </label> <br>
                <input type="text" id="location" name="location"> <br>
                <label for="description">Opis: </label> <br>
                <input type="text" id="description" name="description" size="50"> <br>
                <input type="submit" value="Dodaj Ogłoszenie">
            </form>
        </div>
    </div>
@endsection

