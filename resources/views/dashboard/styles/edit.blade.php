@extends('layouts.dashboard.app')

@section('content')
    <h2>Styles</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.styles.index')}}">Styles</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
    <div class="tile mb-4">
        <form method="POST" action="{{ route('admin.styles.update', $style->id)}}" enctype="multipart/form-data">
            @csrf

            @include('dashboard.partials._errors')

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $style->name)}}">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
 
                <input id="" type="file" class="form-control foo {{ $errors->has('image') ? ' is-invalid' : '' }}" 
                                    value="{{ old('image') }}" name="image" onchange="readURL(this);" >
                        <div class="">
                            <a class="addphoto" style="width: 50%;" >
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
                    <img id="blah" src="{{ asset('uploads/styleImages') }}/{{ $style->image }}" width="100px"  alt="your image" />
                <br><br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
            </div>
        </form>
    </div> <!-- end of tile -->
@endsection