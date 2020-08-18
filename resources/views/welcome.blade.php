@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach($artworks as $artwork)
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-2">
            <a href="{{ route('artwork.show', [$artwork->id, $artwork->slug])}}">
                <div class="card" style="">
                    <img src="{{ asset('artworks/Paard.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $artwork->title }}</h5>
                        <p>€ {{ $artwork->price }} / € {{ $artwork->rent }}</p>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
            </a>
            <br>
        </div>
        
        @endforeach

    </div>
</div>
@endsection
