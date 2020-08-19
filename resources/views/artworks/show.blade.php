@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <img src="{{ asset('artworks/Paard.jpg')}}" class="card-img-top" alt="...">
        </div>
        <div class="col-xs-12 col-md-6">
            <h1>{{$artwork->title}}</h1>
            <p>{{$artwork->description}}</p>

            <hr>
                <div class="row">
                    <div class="card">
                        <div class="card-header">breedte</div>
                        <div class="card-body">{{ $artwork->width }}</div>
                    </div>
                    <div class="card">
                        <div class="card-header">hoogte</div>
                        <div class="card-body">{{ $artwork->height }}</div>   
                    </div>
                </div>
                <br>
                @if(Auth::check()&&Auth::user()->user_type='customer')
                    <button class="btn btn-success"></button>
                @endif
            </div>
        </div>
        <hr>
        <div class="col-xs-12 text-center">
            <a type="button" href="{{ route('artist.index', [$artwork->artist->id, $artwork->artist->slug])}}">Meer over {{  $artwork->artist->artist_name }}</a>
        </div>
    </div>
</div>
@endsection
