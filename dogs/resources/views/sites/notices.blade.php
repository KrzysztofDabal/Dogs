@extends('layouts.app')

@section('title')
    Ogłoszenia
@endsection

@section('content')
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            Ogłoszenia
            <p>{{ session('mssg') }}</p>
        </div>


        <div>
            @foreach($notices as $notice)
                <div class="notice">
                    <div class="links flex-center">
                        <img src="/img/doghouse.png" width="140px" height="100px">
                        {{ $notice->user }} - {{ $notice->name }} - {{ $notice->type }} - {{ $notice->race }} - {{ $notice->age }} - {{ $notice->date }} - {{ $notice->location }}<br/>

                        <a href="http://127.0.0.1:8000/notices/{{ $notice->id }}">
                            Zobacz
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
