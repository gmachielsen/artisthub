@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <search-component></search-component>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="desktop col-sm-12 col-md-4 col-lg-3">


            <form action="{{route('all.artworks')}}" method="GET">
            <div class="form-inline filter">
                <div class="form-group col-md-12">
                <label for="category">Categorie</label>
                    <!-- @foreach(App\Category::all() as $cat)
                        <input type="checkbox" name="pattern[]" id="{{ $cat->id }}" value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach -->
                <select name="category_id" id="category_id" class="form-control" id="">
                    <option value="0">Selecteer categorie</option>

                    @foreach(App\Category::all() as $cat)
                    <option value=" {{ $cat->id }} " {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>

                    @endforeach
                </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="style">Stijl</label>
                    <select name="style_id" class="form-control" id="">
                        <option value="0">Selecteer stijl</option>
                        @foreach(App\Style::all() as $style)
                            <option value="{{$style->id}}" {{ old('style_id') == $style->id ? 'selected' : '' }}>{{$style->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="style">Techniek</label>
                    <select name="technic_id" class="form-control" id="">
                    <option value="0">Selecteer techniek</option>
                        @foreach(App\Technic::all() as $technic)
                            <option value="{{$technic->id}}" {{ old('technic_id') == $technic->id ? 'selected' : '' }}>{{$technic->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="orientation">Oriëntatie</label>
                    <select name="orientation" class="form-control">
                        <option value="0" {{ old('orientation') == 0 ? 'selected' : '' }}>Selecteer Oriëntatie</option>
                        <option value="1" {{ old('orientation') == 1 ? 'selected' : '' }}>Liggend / horizontaal</option>
                        <option value="2" {{ old('orientation') == 2 ? 'selected' : '' }}>Staand / verticaal</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="framed">Ingelijst</label>
                    <select name="framed" class="form-control">
                        <option value="0" {{ old('framed') == 0 ? 'selected' : '' }}>selecteer optie</option>
                        <option value="1" {{ old('framed') == 1 ? 'selected' : '' }}>Ja, met lijst</option>
                        <option value="2" {{ old('framed') == 2 ? 'selected' : '' }}>Nee, zonder lijst</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="filterbuttons">
                        <div class="col-6">
                            <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">
                        </div>
                        <div class="col-6">
                            <a type="button" class="btn btn-primary" href="{{ route('all.artworks')}}">Reset</a>
                        </div>
                        </div>
                    </div>
                </div>
                <search-component></search-component>

            </div>    
            <br>
            </form>
        </div>
        <div class="mobile col-12" style="padding: 0px;">

            <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Filter
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <form action="{{route('all.artworks')}}" method="GET">
            <div class="form-inline filter">
                <div class="form-group col-md-12">
                <label for="category">Categorie</label>
                    <!-- @foreach(App\Category::all() as $cat)
                        <input type="checkbox" name="pattern[]" id="{{ $cat->id }}" value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach -->
                <select name="category_id" id="category_id" class="form-control" id="">
                    <option value="0">Selecteer categorie</option>

                    @foreach(App\Category::all() as $cat)
                    <option value=" {{ $cat->id }} " {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>

                    @endforeach
                </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="style">Stijl</label>
                    <select name="style_id" class="form-control" id="">
                        <option value="0">Selecteer stijl</option>
                        @foreach(App\Style::all() as $style)
                            <option value="{{$style->id}}" {{ old('style_id') == $style->id ? 'selected' : '' }}>{{$style->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="style">Techniek</label>
                    <select name="technic_id" class="form-control" id="">
                    <option value="0">Selecteer techniek</option>
                        @foreach(App\Technic::all() as $technic)
                            <option value="{{$technic->id}}" {{ old('technic_id') == $technic->id ? 'selected' : '' }}>{{$technic->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="orientation">Oriëntatie</label>
                    <select name="orientation" class="form-control">
                        <option value="0" {{ old('orientation') == 0 ? 'selected' : '' }}>Selecteer Oriëntatie</option>
                        <option value="1" {{ old('orientation') == 1 ? 'selected' : '' }}>Liggend / horizontaal</option>
                        <option value="2" {{ old('orientation') == 2 ? 'selected' : '' }}>Staand / verticaal</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="framed">Ingelijst</label>
                    <select name="framed" class="form-control">
                        <option value="0" {{ old('framed') == 0 ? 'selected' : '' }}>selecteer optie</option>
                        <option value="1" {{ old('framed') == 1 ? 'selected' : '' }}>Ja, met lijst</option>
                        <option value="2" {{ old('framed') == 2 ? 'selected' : '' }}>Nee, zonder lijst</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="filterbuttons">
                        <div class="col-6">
                            <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">
                        </div>
                        <div class="col-6">
                            <a type="button" class="btn btn-primary" href="{{ route('all.artworks')}}">Reset</a>
                        </div>
                        </div>
                    </div>
                </div>
                <search-component></search-component>

            </div>    
            <br>
            </form>      </div>
    </div>
  </div>

</div>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-9">
            <div class="row">
                <div class="sort text-right">
                    <!-- <select onchange="location = this.value;">
                        <option value="">Sorteer collectie</option>
                        <option value="?sortBy=price" {{ (request('sortBy') == 'price' ? 'selected=selected' : '') }} >Prijs van laag naar hoog</option>
                        <option value="?sortBy=rate" {{ (request('sortBy') == 'rate' ? 'selected=selected' : '') }} >Prijs van hoog naar laag</option>
                        <option value="?sortBy=rate" {{ (request('sortBy') == 'rate' ? 'selected=selected' : '') }}>Prijs van laag naar hoog</option>
                        <option value="?sortBy=rate" {{ (request('sortBy') == 'rate' ? 'selected=selected' : '') }}>Prijs van hoog naar laag</option> -->
                        <!-- <option value="?sortBy=popular" {{ (request('sortBy') == 'popular' ? 'selected=selected' : '') }}></option>
                        <option value="?sortBy=popular" {{ (request('sortBy') == 'popular' ? 'selected=selected' : '') }}>Date</option>
                    </select> -->
                </div>
            </div>
            <br>
            <div class="row">
            @foreach($artworks as $artwork)
                <div class="col-6 col-sm-6 col-md-4 col-lg-3">
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
        </div>
    </div>
</div>
@endsection
