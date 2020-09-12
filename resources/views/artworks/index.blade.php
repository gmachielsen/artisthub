@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <form action="{{route('all.artworks')}}" method="GET">
            <div class="form-inline">
                <div class="form-group">
                    <label>Position&nbsp;</label>
                    <input type="text" name="position" class="form-control" placeholder="job position">&nbsp;&nbsp;&nbsp;
                </div>
                <div class="form-group">
                <label for="category">Categorie</label>
                <select name="category_id" class="form-control" id="">
                    @foreach(App\Category::all() as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                    <label for="style">Stijl</label>
                    <select name="style_id" class="form-control" id="">
                        @foreach(App\Style::all() as $style)
                            <option value="{{$style->id}}">{{$style->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="style">Techniek</label>
                    <select name="technic_id" class="form-control" id="">
                        @foreach(App\Technic::all() as $technic)
                            <option value="{{$technic->id}}">{{$technic->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="orientation">Orientatie</label>
                    <select name="orientation" class="form-control">
                        <option value="choose">kies optie...</option>
                        <option value="horizontal">Liggend / horizontaal</option>
                        <option value="vertical">Staand / verticaal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="framed">Ingelijst</label>
                    <select name="framed" class="form-control">
                        <option value="choose">kies optie...</option>
                        <option value="yes">Ja, met lijst</option>
                        <option value="no">Nee, zonder lijst</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">
                </div>
            </div>    
            <br>
            </form>
        </div>
    </div>
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
        </div>
        @endforeach
    </div>
</div>
@endsection