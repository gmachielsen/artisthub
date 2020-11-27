@extends('layouts.app')
@section('content')


@section('content')
<div class="container">
    <div class="row">
    <h1>{{$categoryName->name}}</h1>
    <div class="row">
            @foreach($artworks as $artwork)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <a href="{{ route('artworks.show', [$artwork->id, $artwork->slug])}}">
                        <div class="card" style="">
                            <img src="{{ asset('artworks/Paard.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p>€ {{ $artwork->price }} / € {{ $artwork->rent }}</p>

                            </div>
                        </div>
                    </a>
                    <br>
                </div>
            @endforeach
            </div>
        {{ $artworks->links()}}

    </div>
</div>

@endsection
<style>
.fa {
    color: #4183D7;
}
</style>