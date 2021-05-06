@extends('layouts.app')

@section('title')
    Wiadomość -
@endsection

@section('message')
    <div class="card-header">
        <form action="{{ route('messages.create') }}" method="POST"> <br>
            @csrf
            <input type="hidden" id="sender_id" name="sender_id" value="{{ $conversation->sender_id }}">
            <input type="hidden" id="conversation_id" name="conversation_id" value="{{ $conversation->id }}">
            <label for="description">Napisz wiadomość: </label> <br>
            <input type="text" id="message" name="message"> <br>
            <input type="submit" value="Wyślij">
        </form>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('notices.show', $notice->id) }}">
                        <h5>{{ $notice->title }}<br/></h5>
                    </a>
                    <a href="{{ route('messages.index') }}">
                        <- powrót do wiadomości<br/>
                    </a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <?php
                        $value =0;
                    ?>
                        @foreach($messages as $message)
                            @if($value!=$message->sender_id)
                            <div class="card-header">
                                {{ $message->sender_name }}
                            </div>
                            @endif
                                <div class="">
                                        |{{ $message->created_at->format('H:i:s') }}|

                                        {{ $message->message }}
                                </div>
                                  <br>
                                <?php
                                $value =$message->sender_id;
                                ?>
                        @endforeach

                    @yield('message')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
