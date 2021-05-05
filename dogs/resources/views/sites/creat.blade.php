@extends('layouts.app')

@section('title')
    Dodaj Ogłoszenie
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formularz Ogłoszenia</div>
                    <div class="card-body">
                        <form action="/create/" method="POST"> <br>
                            @csrf
                            <label for="name">Tytul ogłoszenia: </label> <br>
                            <input type="text" id="title" name="title" class="form-control"> <br>
                            <label for="name">Imię Psa: </label> <br>
                            <input type="text" id="name" name="name" class="form-control"> <br>
                            <label for="type">Rodzaj Psa: </label> <br>
                            <div class="form-group">
                                <input type="radio" id="type" name="type" value="tiny" class="form-check-inline" checked>Malutki
                                <input type="radio" id="type" name="type" value="small" class="form-check-inline">Mały
                                <input type="radio" id="type" name="type" value="medium" class="form-check-inline">Średni
                                <input type="radio" id="type" name="type" value="big" class="form-check-inline">Duży
                                <input type="radio" id="type" name="type" value="huge" class="form-check-inline">Ogromny!!
                            </div>
                            <label for="race">Rasa Psa: </label> <br>
                            <input type="text" id="race" name="race" class="form-control"> <br>
                            <label for="age">Wiek Psa: </label> <br>
                            <input type="number" id="age" name="age" class="form-control"> <br>
                            <label for="price">Cena: </label> <br>
                            <input type="number" id="reward" name="reward" class="form-control"> <br>
                            <label for="date">Data: </label> <br>
                            <input type="date" id="date" name="date" class="form-control"> <br>
                            <label for="time">Godzina: </label> <br>
                            <input type="time" id="time" name="time" class="form-control"> <br>
                            <label for="location">Lokalizacja: </label> <br>
                            <input type="text" id="location" name="location" class="form-control"> <br>
                            <label for="description">Opis: </label> <br>
                            <input type="text" id="description" name="description" size="50" class="form-control"> <br>
                            <input type="submit" value="Dodaj Ogłoszenie">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

