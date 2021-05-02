@extends('layouts.app')

@section('title')
    Regulamin
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Regulamin<br/></h5>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean luctus volutpat ligula non posuere. Maecenas vitae aliquet magna. Sed sed pulvinar nisl, eget ultricies risus. Suspendisse turpis urna, ultrices quis commodo aliquet, consectetur ut velit. Nam blandit nunc vel diam cursus, a malesuada lorem dapibus. Integer a lorem a justo pellentesque scelerisque quis at augue. Donec sit amet magna id mi porttitor feugiat. Nam nec tristique odio, id placerat sapien. Suspendisse tempor vulputate diam, at commodo diam blandit eu. Aliquam sagittis nisl at nulla condimentum, vitae vulputate nunc malesuada. Pellentesque at quam vel felis imperdiet scelerisque at eget lorem. Maecenas sagittis eleifend odio. Vestibulum dignissim elit non nulla porttitor dapibus. Aliquam erat volutpat. Proin aliquet, lectus eu egestas vulputate, erat tortor malesuada arcu, eu malesuada ex sem id nulla. Vivamus varius aliquet tellus, ut dignissim odio feugiat quis.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
