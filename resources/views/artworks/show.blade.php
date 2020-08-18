@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-6">
            <img src="{{ asset('artworks/Paard.jpg')}}" class="card-img-top" alt="...">
        </div>
        <div class="col-xs-12 col-md-6">
            <h1>{{$artwork->title}}</h1>
            <p>{{$artwork->description}}</p>

            <hr>
                <div class="row">
                    <div class="card">
                        <div class="card-header">width</div>
                        <div class="card-body">{{ $artwork->width }}</div>
                    </div>
                    <div class="card">
                        <div class="card-header">height</div>
                        <div class="card-body">{{ $artwork->height }}</div>   
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-xs-12 text-center">
            <a type="button"href="">Meer over deze kunstenaar</a>
        </div>
    </div>
</div>
@endsection
