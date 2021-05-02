@extends('layouts.app')

@section('title')
    Dogs House - Profil
@endsection

@section('messages')
    @foreach($notices as $notice)
        @foreach($messages as $message)
            @if($message->notice_id==$notice->id)
                <div class="links flex-center">
                    <a href="http://127.0.0.1:8000/messages/{{ $message->id }}/">
                        {{ $notice->title }}
                    </a>
                </div>
            @endif
        @endforeach
    @endforeach
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Wiadomości<br/></h5>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            @yield('messages')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
