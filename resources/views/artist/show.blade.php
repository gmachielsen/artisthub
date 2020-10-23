@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="artist profile col-xs-12 col-md-3">
            <div class="avatar">
                <img src="{{ asset('avatar/Gijs.jpg')}}" alt="">
            </div>
        </div>
        <div class="col-xs-12 col-md-9">
            <h1>{{ $artist->artist_name }} ({{ $artist->YearOfBirth}})</h1>
            <h3>{{ $artist->shorttext }}</h3>
            <p>{{ $artist->description }}</p>
        </div>
    </div>
    
</div>
<br>
<div class="container">
    <div class="row">
        @foreach($artist->artworks as $artwork)
        
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
            <a href="{{ route('artworks.show', [$artwork->id, $artwork->slug])}}">
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
