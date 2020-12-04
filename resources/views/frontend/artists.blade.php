@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/artists.css') }}" rel="stylesheet">
@endpush
@section('content')

<div class="row">
    @foreach($artists as $artist)
        <div class=" col-6 col-md-4 col-lg-3 col-xl-2">
            <a type="button" href="{{ route('artist.show', [$artist->id, $artist->slug])}}">

                <div class="picture" style="">
                    <img src="{{ asset('uploads/profilephoto') }}/{{ $artist->profile_photo }}"  alt="">
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
