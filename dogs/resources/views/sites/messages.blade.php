@extends('layouts.app')

@section('title')
    Dogs House - Profil
@endsection

@section('messages')
    @foreach($notices as $notice)
        @foreach($conversations as $conversation)
            @if($conversation->notice_id==$notice->id)
                <div class="links flex-center">
                    <a href="{{ route('messages.show', $conversation->id) }}">
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
