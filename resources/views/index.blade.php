@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 _leftNav">

                    <div class="card leftNav cate-sect">
                        <h3>Refine By:<span class="_t-item">(0 items)</span></h3>
                        <div class="col-12 p-0" id="catFilters"></div>
                    </div>

                    <div class="card leftNav cate-sect">

                        <div class="accordion" id="accordionExample">
                            <div class="card-header" id="headingTwo">
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Categories</button>
                            </div>

                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="panel-body">
                                @foreach(App\Category::all() as $cat)
                                    <div class="col-sm-12">
                                        <label for="">
                                            <input type="checkbox" name="pattern[]" id="{{ $cat->id }}" value="{{$cat->iid}}">{{$cat->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-10 col-lg-9 col-md-8 col-sm-12">
                    <!-- <div class="card rightSide h-100 mb-0"> -->
                        <h1><span class="greencolor category_name_heading"></span></h1>
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
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2">


            <form action="{{route('all.artworks')}}" method="GET">
            <div class="form-inline">
                <div class="form-group">
                <label for="category">Categorie</label>
                    <!-- @foreach(App\Category::all() as $cat)
                        <input type="checkbox" name="pattern[]" id="{{ $cat->id }}" value="{{$cat->iid}}">{{$cat->name}}</option>
                    @endforeach -->
                <select name="category_id" class="form-control" id="">
                    <option value="">Selecteer categorie</option>
                    @foreach(App\Category::all() as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
                </div>

                <div class="form-group">
                    <label for="style">Stijl</label>
                    <select name="style_id" class="form-control" id="">
                        <option value="">Selecteer stijl</option>
                        @foreach(App\Style::all() as $style)
                            <option value="{{$style->id}}">{{$style->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="style">Techniek</label>
                    <select name="technic_id" class="form-control" id="">
                    <option value="">Selecteer techniek</option>
                        @foreach(App\Technic::all() as $technic)
                            <option value="{{$technic->id}}">{{$technic->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="orientation">Oriëntatie</label>
                    <select name="orientation" class="form-control">
                        <option value="">Selecteer Oriëntatie</option>
                        <option value="horizontal">Liggend / horizontaal</option>
                        <option value="vertical">Staand / verticaal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="framed">Ingelijst</label>
                    <select name="framed" class="form-control">
                        <option value="choose">selecteer optie</option>
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
        <div class="col-sm-12 col-md-8 col-lg-9 col-xl-10">
            <div class="row">
                <div class="sort text-right">
                    <select onchange="location = this.value;">
                        <option value="">Sorteer collectie</option>
                        <option value="?sortBy=price" {{ (request('sortBy') == 'price' ? 'selected=selected' : '') }} >Prijs van laag naar hoog</option>
                        <option value="?sortBy=rate" {{ (request('sortBy') == 'rate' ? 'selected=selected' : '') }} >Prijs van hoog naar laag</option>
                        <!-- <option value="?sortBy=rate" {{ (request('sortBy') == 'rate' ? 'selected=selected' : '') }}>Prijs van laag naar hoog</option>
                        <option value="?sortBy=rate" {{ (request('sortBy') == 'rate' ? 'selected=selected' : '') }}>Prijs van hoog naar laag</option> -->
                        <!-- <option value="?sortBy=popular" {{ (request('sortBy') == 'popular' ? 'selected=selected' : '') }}></option>
                        <option value="?sortBy=popular" {{ (request('sortBy') == 'popular' ? 'selected=selected' : '') }}>Date</option> -->
                    </select>
                </div>
            </div>
            <br>
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
    </div>
</div>
@endsection
