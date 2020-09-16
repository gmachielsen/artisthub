@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <div class="col-sm-12">
        <h1>Pas dit werk aan.</h1>
                @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message')}}
                        </div>
                @endif
        </div>
    </div>
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

                @if(Auth::check()&&Auth::user()->user_type=='customer')
                    @if(!$artwork->checkApplication())
                    <form action="{{ route('artwork.request', [$artwork->id, $artwork->user_id])}}" method="POST">

                        @csrf
                        <button type="submit" class="btn btn-success" style="width: 100%;">Ik heb interesse</button>
                    </form>
                    @else 
                    <form action="" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" style="width: 100%;">Ik heb geen interesse meer</button>
                    </form>
                    @endif
                @endif
                @if(Auth::check()&&Auth::user()->user_type='customer')
                <favourite-component :artworkid={{ $artwork->id }}
                :favorited={{$artwork->checkSaved()?'true':'false'}}></favourite-component>

                @endif

                @if(Auth::check()&&Auth::user()->user_type=='customer')
                    <form action="{{ route('send.message.profile', [$artwork->id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="email" class="form-group">
                        <div class="form-group">
                            <label for="phone">Uw telefoonnummer</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Uw bericht</label>
                            <input type="text" name="message" class="form-group">
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 100%;">Vestuur bericht</button>
                    </form>

                    <form action="{{ route('save.artwork', [$artwork->id])}}" method="POST">
                        @csrf
                        <button type="submit">test</button>
                    </form>

                @else
                    <form action="{{ route('send.message', [$artwork->id])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Uw naam</label>
                            <input type="text" name="name" class="form-group">
                        </div>
                        <div class="form-group">
                            <label for="phone">Uw telefoonnummer (niet verplicht)</label>
                            <input type="text" name="phone" class="form-group">
                        </div class="form-group">
                        <div class="form-group">
                            <label for="email">Uw email</label> 
                            <input type="email" name="email" class="form-group">
                        </div>
                        <div class="form-group">
                            <label for="message">Uw bericht</label>
                            <input type="text" name="message" class="form-group">
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 100%;">Vestuur bericht</button>
                    </form>
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
