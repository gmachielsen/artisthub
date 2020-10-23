@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach($artworks as $artwork)
        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <a href="{{ route('artworks.show', [$artwork->id, $artwork->slug])}}">
                <div class="card" style="">
                    <img src="{{ asset('artworks/Paard.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $artwork->artist->artist_name }}</h5>
                        <p>€ {{ $artwork->price }} / € {{ $artwork->rent }}</p>

                    </div>
                </div>
            </a>
            <br>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <br><br>
        <a href="{{ route('all.artworks')}}"><button>Browse door onze kunstwerken</button></a>
        <br><br>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        @foreach($artists as $artist)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <a type="button" href="{{ route('artist.show', [$artist->id, $artist->slug])}}">

                    <div class="card" style="">
                        <img src="{{ asset('uploads/profilephoto') }}/{{ $artist->profile_photo }}" width="100px" artwork="width: 100px" alt="">
                        <div class="card-body">
                            <p>{{ $artist->artist_name }}</p>
                        </div>
                    </div>
                </a>
                <br>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <br><br>
        <a  href="{{ route('all.artists')}}"><button>Browse door onze kunstenaars</button></a>
        <br><br>
    </div>
</div>
@endsection
