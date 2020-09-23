@extends('layouts.dashboard.app')

@section('content')
    <h2>Artworks</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.artworks.index')}}">Artworks</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
    <div class="tile mb-4">
        <form method="POST" action="{{ route('admin.artworks.update', $artwork->id)}}" enctype="multipart/form-data">
            @csrf

            @include('dashboard.partials._errors')

            <div class="form-group">
                <label>Title</label>
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
                <label for="image">Image</label>
 
                <input id="" type="file" class="form-control foo {{ $errors->has('image') ? ' is-invalid' : '' }}" 
                                    value="{{ old('image') }}" name="image" onchange="readURL(this);" >
                        <div class="">
                            <a class="addphoto" artwork="width: 50%;" >
                                <!-- <i class="fas fa-plus fa-9x"></i> -->

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
                <br><br>
                    <img id="blah" src="{{ asset('uploads/technicImages') }}/{{ $artwork->image }}" width="100px"  alt="your image" />
                <br><br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
            </div>
        </form>
    </div> <!-- end of tile -->
@endsection