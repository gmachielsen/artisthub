@extends('layouts.dashboard.app')

@section('content')
    <h2>Artworks</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.artworks.index')}}">Artworks</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>
    <div class="tile mb-4">
    <form action="{{ route('admin.artworks.store')}}" name="profile" method="POST" class="form-global form-horizontal" enctype="multipart/form-data">
            @csrf
            @include('dashboard.partials._errors')

            <div class="form-group">
                <label for="title">titel</label>
                <input type="text" name="title" class="form-control
                {{ $errors->has('title') ? ' is-invalid' : '' }}" 
                value="{{ old('title') }}"
                placeholder="Vul de naam of titel in van het kunstobject">
                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="year">Jaar van werk</label>
                <input type="text" name="year" class="form-control {{ $errors->has('year') ? ' is-invalid' : '' }}" 
                value="{{ old('year') }}" placeholder="Vul in jaar waarin kunstobject voltooid is">
                @if ($errors->has('year'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('year') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="category">Artsist</label>
                <select name="artist_id" class="form-control" id="">
                    @foreach(App\Artist::all() as $artist)
                        <option value="{{$artist->user_id}}">{{$artist->artist_name}}</option>
                    @endforeach
                </select>
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
                <label for="description">Beschrijving</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" 
                value="{{ old('description') }}" placeholder="Geef een beschrijving van het kunstobject"></textarea>
                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="width">Breedte in centimeters</label>
                <input type="number" name="width" placeholder="Vul in breedte in centimeters" class="form-control {{ $errors->has('width') ? ' is-invalid' : '' }}" 
                value="{{ old('width') }}">
                @if ($errors->has('width'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('width') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="height">Hoogte in centimeters</label>
                <input type="number" name="height" placeholder="Vul in hoogte in centimeters" class="form-control {{ $errors->has('height') ? ' is-invalid' : '' }}" 
                value="{{ old('height') }}">
                @if ($errors->has('height'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('height') }}</strong>
                    </span>
                @endif
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
                <label for="price">Prijs</label>
                <input type="number" name="price" placeholder="Vul bedrag in euro in" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" 
                value="{{ old('price') }}">
                @if ($errors->has('price'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="rent">Huurprijs per maand</label>
                <input type="number" name="rent" placeholder="Vul bedrag euro in" class="form-control">
            </div> 
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="choose">kies optie...</option>
                    <option value="1">Online, actief op de website</option>
                    <option value="0">Offline, niet actief op de website</option>
                </select>
            </div>
            <div class="form-group">
                <label for="photos">foto's</label>
                <div class="row profile_image_row" style="">
                <div class="col-sm-12 col-md-3">
                    <div class="artwork_image">
                        
                        <label style="margin-bottom: 0px;">Add Photo</label>
                        <div class="">
                            <a class="addphoto" style="width: 50%;" >
                                <!-- <i class="fas fa-plus fa-9x"></i> -->
                                    <input id="" type="file" class="form-control foo {{ $errors->has('picture') ? ' is-invalid' : '' }}" 
                                    value="{{ old('picture') }}" name="picture" onchange="readURL(this);" >
                                    @if ($errors->has('picture'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('picture') }}</strong>
                                        </span>
                                    @endif
                                    <script>
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                $('#blah')
                                                    .attr('src', e.target.result)
                                                    .width(250)
                                                    .height(250)
                                                    .css('object-fit', 'cover');
                                            };

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>                            
                            </a>

                        </div>
                    </div>
                </div>

                </div>
            </div>
                <br><br><br>
                    <img id="blah" src="#" alt="your image" />
            <div class="form-group">
                <button class="btn btn-success float-right" type="submit">Opslaan</button>
            </div>
        </form>
    </div> <!-- end of tile -->
@endsection