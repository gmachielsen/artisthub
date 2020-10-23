@extends('layouts.app')

@section('content')

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

@endsection
