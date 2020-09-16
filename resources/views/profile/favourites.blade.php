@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
        @foreach($artworks as $artwork)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
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
            <form action="{{ route('unsave.artwork', [$artwork->id]) }}" method="POST">
                @csrf
                <button>Verwijder als favoriet</button>
            </form>
        </div>
        @endforeach

        </div>
    </div>
</div>
@endsection