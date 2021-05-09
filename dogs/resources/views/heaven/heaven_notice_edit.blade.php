@extends('layouts.heaven_layout')

@section('title')
    Edycja Ogłoszenia - Tytuł ogłoszenia
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Formularz Ogłoszenia</h5>
                        <a href="{{ route('heaven.notices.index') }}"><- wróć do listy ogłoszeń</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('heaven.notices.update', $notice->id) }}" method="POST"> <br>
                            @csrf
                            <label for="name">Tytul ogłoszenia: </label> <br>
                            <input type="text" id="title" name="title" value="{{ $notice->title }}" class="form-control"> <br>
                            <label for="name">Imię Psa: </label> <br>
                            <input type="text" id="name" name="name" value="{{ $notice->name }}" class="form-control"> <br>
                            <label for="type">Rodzaj Psa: </label> <br>
                            <label><input type="radio" id="type" name="type" value="tiny" @if($notice->type=='tiny') checked @endif>Malutki</label>
                            <label><input type="radio" id="type" name="type" value="small" @if($notice->type=='small') checked @endif>Mały</label>
                            <label><input type="radio" id="type" name="type" value="medium" @if($notice->type=='medium') checked @endif>Średni</label>
                            <label><input type="radio" id="type" name="type" value="big" @if($notice->type=='big') checked @endif>Duży</label>
                            <label><input type="radio" id="type" name="type" value="huge" @if($notice->type=='huge') checked @endif>Ogromny!!</label><br/>
                            <label for="race">Rasa Psa: </label> <br>
                            <input type="text" id="race" name="race" value="{{ $notice->race }}" class="form-control"> <br>
                            <label for="age">Wiek Psa: </label> <br>
                            <input type="number" id="age" name="age" value="{{ $notice->age }}" class="form-control"> <br>
                            <label for="price">Cena: </label> <br>
                            <input type="number" id="reward" name="reward" value="{{ $notice->reward }}" class="form-control"> <br>
                            <label for="date">Data: </label> <br>
                            <input type="date" id="date" name="date" value="{{ $date }}" class="form-control"> <br>
                            <label for="time">Godzina: </label> <br>
                            <input type="time" id="time" name="time" value="{{ $time }}" class="form-control"> <br>
                            <label for="location">Lokalizacja: </label> <br>
                            <input type="text" id="location" name="location" value="{{ $notice->location }}" class="form-control"> <br>
                            <label for="description">Opis: </label> <br>
                            <input type="text" id="description" name="description" size="50" value="{{ $notice->description }}" class="form-control"> <br>
                            <input type="submit" value="Edytuj Ogłoszenie">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
