@extends('layouts.app')

@section('title')
    Opis strony
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>O stronie<br/></h5>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            Strona umożliwia na przeglądanie ogłoszeń dla użytkowników niezalogowanych.<br>
                            Po zalogowaniu użytkownik dostaje możliwość tworzenia własnych ogloszeń oraz ich edycję i usuwanie.<br>
                            Dodatkowo może odpisywać na istniejące już ogłoszenia.<br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
