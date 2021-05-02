@extends('layouts.app')

@section('title')
    Wiadomość -
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $notice->title }}<br/></h5>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header">
                        {{ $user->name }}
                    </div>
                    {{ $message->message }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
