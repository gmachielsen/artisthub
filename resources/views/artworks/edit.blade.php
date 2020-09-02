@push('styles')
    <link href="{{ asset('css/create_artwork.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <h1>Pas dit werk aan.</h1>
                @if(Session::has('create.artwork'))
                        <div class="alert alert-success">
                            {{ Session::get('create.artwork')}}
                        </div>
                @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12">
        <form action="{{ route('artwork.store')}}" name="profile" method="POST" class="form-global form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">titel</label>
                <input type="text" name="title" class="form-control
                {{ $errors->has('title') ? ' is-invalid' : '' }}" 
                value="{{ $artwork->title }}"
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
                value="{{ $artwork->year }}" placeholder="Vul in jaar waarin kunstobject voltooid is">
                @if ($errors->has('year'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('year') }}</strong>
                    </span>
                @endif
            </div>

            
            <div class="form-group">
                <label for="category">Categorie</label>
                <select name="category_id" class="form-control" id="">
                    @foreach(App\Category::all() as $cat)
                        <option value="{{$cat->id}}" {{$cat->id==$artwork->category_id?'selected':''}}>{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="style">Stijl</label>
                <select name="style_id" class="form-control" id="">
                    @foreach(App\Style::all() as $style)
                        <option value="{{$style->id}}" {{$style->id==$artwork->style_id?'selected':''}}>{{$style->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="style">Techniek</label>
                <select name="technic_id" class="form-control" id="">
                    @foreach(App\Technic::all() as $technic)
                        <option value="{{$technic->id}}" {{$technic->id==$artwork->technic_id?'selected':''}}>{{$technic->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Beschrijving</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" 
                 placeholder="Geef een beschrijving van het kunstobject">{{ $artwork->description }}</textarea>
                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="width">Breedte in centimeters</label>
                <input type="number" name="width" placeholder="Vul in breedte in centimeters" class="form-control {{ $errors->has('width') ? ' is-invalid' : '' }}" 
                value="{{ $artwork->width }}">
                @if ($errors->has('width'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('width') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="height">Hoogte in centimeters</label>
                <input type="number" name="height" placeholder="Vul in hoogte in centimeters" class="form-control {{ $errors->has('height') ? ' is-invalid' : '' }}" 
                value="{{ $artwork->height }}">
                @if ($errors->has('height'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('height') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="orientation">Orientatie</label>
                <select name="orientation" class="form-control">
                    <option value="choose"{{$artwork->orientation=='choose'?'selected':''}}>kies optie...</option>
                    <option value="horizontal"{{$artwork->orientation=='horizontal'?'selected':''}}>Liggend / horizontaal</option>
                    <option value="vertical"{{$artwork->orientation=='vertical'?'selected':''}}>Staand / verticaal</option>
                </select>
            </div>
            <div class="form-group">
                <label for="framed">Ingelijst</label>
                <select name="framed" class="form-control">
                    <option value="choose"{{$artwork->framed=='choose'?'selected':''}}>kies optie...</option>
                    <option value="yes"{{$artwork->framed=='yes'?'selected':''}}>Ja, met lijst</option>
                    <option value="no"{{$artwork->framed=='no'?'selected':''}}>Nee, zonder lijst</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Prijs</label>
                <input type="number" name="price" placeholder="Vul bedrag in euro in" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" 
                value="{{ $artwork->price }}">
                @if ($errors->has('price'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="rent">Huurprijs per maand</label>
                <input type="number" name="rent" placeholder="Vul bedrag euro in" class="form-control" value="{{ $artwork->rent }}">
            </div> 
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="choose">kies optie...</option>
                    <option value="1"{{$artwork->status=='1'?'selected':''}}>Online, actief op de website</option>
                    <option value="0"{{$artwork->status=='0'?'selected':''}}>Offline, niet actief op de website</option>
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
                    <img id="blah" src="{{ asset('uploads/artworks') }}/{{$artwork->picture }}" alt="your image" />
            <div class="form-group">
                <button class="btn btn-success float-right" type="submit">Opslaan</button>
            </div>
        </form>
        </div>        
    </div>
</div>
@endsection