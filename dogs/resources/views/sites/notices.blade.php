@extends('layouts.app')

@section('title')
    Ogłoszenia
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

                        @foreach($notices as $notice)
                            <div class="">
                                <div class="links">
                                    <a href="http://127.0.0.1:8000/notices/{{ $notice->id }}/">
                                        {{ $notice->title }}
                                    </a><br/>
                                    <img src="/img/doghouse.png" width="140px" height="100px">
                                    {{ $notice->user }} - {{ $notice->name }} - {{ $notice->type }} - {{ $notice->race }} - {{ $notice->age }} - {{ $notice->date }} - {{ $notice->location }}<br/>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
