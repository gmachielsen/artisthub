@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="title">titel</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="year">Jaar van werk</label>
                <input type="text" name="year" class="form-control">
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
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="width">Breedte in centimeters</label>
                <input type="number" name="width" class="form-control">
            </div>
            <div class="form-group">
                <label for="height">Hoogte in centimeters</label>
                <input type="number" name="height" class="form-control">
            </div>
            <div class="form-group">
                <label for="orentation">Orientatie</label>
                <select name="orentation" class="form-control">
                    <option value="horizontal">Liggend / horizontaal</option>
                    <option value="vertical">Staand / verticaal</option>
                </select>
            </div>
            <div class="form-group">
                <label for="orentation">Ingelijst</label>
                <select name="orentation" class="form-control">
                    <option value="yes">Ja, met lijst</option>
                    <option value="no">Nee, zonder lijst</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Prijs</label>
                <input type="number" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="rent">Huurprijs per maand</label>
                <input type="number" name="rent" class="form-control">
            </div> 
            <div class="form-group">
                <label for="orentation">Status</label>
                <select name="orentation" class="form-control">
                    <option value="1">Online, actief op de website</option>
                    <option value="0">Offline, niet actief op de website</option>
                </select>
            </div>
        <div class="form-group">
            <label for="photos">foto's</label>
            <div class="row profile_image_row" style="">
            <div class="col-sm-12 col-md-3">
            <form action="{{ route('profile.photo')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="profile_image">
                    @if(empty(Auth::user()->artist->profile_photo))
                    <img src="{{ asset('avatar/avatar.jpg') }}" width="100" alt="" style="width: 100%; border-radius: 50% 50% 50% 50%;" data-toggle="modal" data-target="#changeProfileImage">
                    @else
                    <img src="{{ asset('uploads/profilephoto') }}/{{Auth::user()->artist->profile_photo }}" width="100" style="width: 100%; border-radius: 50% 50% 50% 50%;" alt="" data-toggle="modal" data-target="#changeProfileImage">
                    @endif
                </div>
                    <!-- Modal -->
                    <div class="modal fade" id="changeProfileImage" tabindex="-1" role="dialog" aria-labelledby="changeProfileImageTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changeProfileImageTitle">Kies ander profielfoto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input id="" type="file" class="form-control" name="profile_photo">
                            <br>
                            <button class="btn btn-dark float-right" type="submit">Update</button>
                        </div>
                        @if($errors->has('avatar'))
                            <div class="error" style="color: red;">{{ $errors->first('avatar') }}</div>
                        @endif
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> -->
                        </div>
                    </div>
                    </div>
                <script>
                    $('#myModal').on('shown.bs.modal', function () {
                    $('#myInput').trigger('focus')
                    })
                </script>
            </form>
            </div>
            <div class="col-sm-12 col-md-3">
            <form action="{{ route('profile.photo')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="profile_image">
                    @if(empty(Auth::user()->artist->profile_photo))
                    <img src="{{ asset('avatar/avatar.jpg') }}" width="100" alt="" style="width: 100%; border-radius: 50% 50% 50% 50%;" data-toggle="modal" data-target="#changeProfileImage">
                    @else
                    <img src="{{ asset('uploads/profilephoto') }}/{{Auth::user()->artist->profile_photo }}" width="100" style="width: 100%; border-radius: 50% 50% 50% 50%;" alt="" data-toggle="modal" data-target="#changeProfileImage">
                    @endif
                </div>
                    <!-- Modal -->
                    <div class="modal fade" id="changeProfileImage" tabindex="-1" role="dialog" aria-labelledby="changeProfileImageTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changeProfileImageTitle">Kies ander profielfoto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input id="" type="file" class="form-control" name="profile_photo">
                            <br>
                            <button class="btn btn-dark float-right" type="submit">Update</button>
                        </div>
                        @if($errors->has('avatar'))
                            <div class="error" style="color: red;">{{ $errors->first('avatar') }}</div>
                        @endif
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> -->
                        </div>
                    </div>
                    </div>
                <script>
                    $('#myModal').on('shown.bs.modal', function () {
                    $('#myInput').trigger('focus')
                    })
                </script>
            </form>
            </div>
            <div class="col-sm-12 col-md-3">
            <form action="{{ route('profile.photo')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="profile_image">
                    @if(empty(Auth::user()->artist->profile_photo))
                    <img src="{{ asset('avatar/avatar.jpg') }}" width="100" alt="" style="width: 100%; border-radius: 50% 50% 50% 50%;" data-toggle="modal" data-target="#changeProfileImage">
                    @else
                    <img src="{{ asset('uploads/profilephoto') }}/{{Auth::user()->artist->profile_photo }}" width="100" style="width: 100%; border-radius: 50% 50% 50% 50%;" alt="" data-toggle="modal" data-target="#changeProfileImage">
                    @endif
                </div>
                    <!-- Modal -->
                    <div class="modal fade" id="changeProfileImage" tabindex="-1" role="dialog" aria-labelledby="changeProfileImageTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changeProfileImageTitle">Kies ander profielfoto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input id="" type="file" class="form-control" name="profile_photo">
                            <br>
                            <button class="btn btn-dark float-right" type="submit">Update</button>
                        </div>
                        @if($errors->has('avatar'))
                            <div class="error" style="color: red;">{{ $errors->first('avatar') }}</div>
                        @endif
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> -->
                        </div>
                    </div>
                    </div>
                <script>
                    $('#myModal').on('shown.bs.modal', function () {
                    $('#myInput').trigger('focus')
                    })
                </script>
            </form>
            </div>
            </div>
        </div>
    </div>        
        </div>
    </div>
</div>
@endsection