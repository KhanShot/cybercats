@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="h2">Lessons</div>
        </div>

        <div class="row row-cols-3 row-cols-1 ow-cols-md-2 g-4">
            @foreach($lessons as $lesson)
                <div class="card w-25 m-4">
                    <img class="card-img" src="{{$lesson->image}}" height="200" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$lesson->name}}</h5>
                        <p class="card-text">{{$lesson->description}}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
