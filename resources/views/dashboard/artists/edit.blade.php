@extends('layouts.dashboard.app')

@section('content')
    <h2>Artists</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index')}}">Artists</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
    <div class="tile mb-4">
    <div class="container">
    <div class="row">
        <div class="col-sm-12">
        @include('dashboard.partials._errors')

        </div>
    </div>
    <div class="row profile_image_row" style="display: flex; justify-content: center">
        <div class="col-xs-12 content-center">
            <form action="{{ route('admin.profile.photo', [$artist->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="profile_image text-center">
                <br>
                    @if(empty($artist->profile_photo))
                    <img src="{{ asset('avatar/avatar.jpg') }}" width="" alt="" style="width: 50%; border-radius: 50% 50% 50% 50%;" data-toggle="modal" data-target="#changeProfileImage">
                    @else
                    <img src="{{ asset('uploads/profilephoto') }}/{{ $artist->profile_photo }}" width="100" style="width: 50%; border-radius: 50% 50% 50% 50%;" alt="" data-toggle="modal" data-target="#changeProfileImage">
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
    <br><hr><br>

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Uw profielgegevens
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <div class="col-xs-12">
                <div class="profile_information">
                    <h3 class="text-center">Uw profielgegevens</h3>
                    <br>
                    <form action="{{ route('admin.create.personal.information', [$artist->id])}}" name="profile" method="POST" class="form-global form-horizontal">
                    @csrf
                        <div id="artist" class="form-global">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="first_name">Artiestnaam</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="uw naam als kunstenaar" name="artist_name" class="form-control" value="{{ $artist->artist_name }}">    
                                                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="first_name">Voornaam</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="voornaam" name="first_name" class="form-control" value="{{ $artist->first_name }}">    
                                                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="last_name">Achternaam</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="achternaam" name="last_name" class="form-control" value="{{ $artist->last_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="YearOfBirth">Geboortejaar</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Uw geboortejaar" name="YearOfBirth" class="form-control" value="{{ $artist->YearOfBirth }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="e-mail">e-mail</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="email" placeholder="email" name="email" class="form-control" value="{{ $artist->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="GSM">GSM</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="mobiel-nummer" name="GSM" class="form-control" value="{{ $artist->GSM }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="phone">Telefoon</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="telefoon-nummer" name="phone" class="form-control" value="{{ $artist->phone }}">
                                    </div>
                                </div>
                            </div>
                           
                            <br>
                            <div class="form-group">
                                <button class="btn btn-success float-right" type="submit">Opslaan</button>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <!-- @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message')}}
                            </div>
                    @endif -->
            </div> 
        </div>
    </div>
  </div>
<div class="card">
<div class="card-header" id="headingTwo">
<h5 class="mb-0">
    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
    Uw bedrijfsgegevens
    </button>
</h5>
</div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            <div class="col-xs-12">
                <div class="company_information">
                <h3 class="text-center">Uw bedrijfsgegevens</h3>
                <br>
                    <form action="{{ route('admin.create.company.information', [$artist->id])}}" name="profile" method="POST" class="form-global form-horizontal">
                    @csrf
                    <div class="form-global">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="website">Uw website</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="uw website" name="website" class="form-control" value="{{ $artist->website }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="company_name">Uw bedrijfsnaam</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="uw bedrijfsnaam" name="company_name" class="form-control" value="{{ $artist->company_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="businessnumber">Uw kvk-nummer</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="uw kvk-nummer" name="businessnumber" class="form-control" value="{{ $artist->businessnumber }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="taxnumber">Uw btw indificatienummer</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Uw btw indificatienummer" name="taxnumber" class="form-control" value="{{ $artist->taxnumber }}">
                                    </div>
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="street_name">Straatnaam</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="uw straatnaam" name="street_name" class="form-control" value="{{ $artist->street_name }}">    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="first_name">Postcode</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="uw postcode" name="postal_code" class="form-control" value="{{ $artist->postal_code }}">    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="house_number">Huisnummer (met toevoeging)</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Huisnumber (Met eventueel gebouwnummer en toevoeging indien nodig)" name="house_number" class="form-control" value="{{ $artist->house_number }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="city">Plaatsnaam</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Uw plaatsnaam" name="city" class="form-control" value="{{ $artist->city }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="country">Land</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="land" name="country" class="form-control" value="{{ $artist->country }}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                        <button class="btn btn-success float-right" type="submit">Opslaan</button>
                        </div>
                    </div>
                    </form>
                    <br><br>
                <!-- @if(Session::has('message'))
                <div class="alert alert-success">
                {{ Session::get('message')}}
                </div>
                @endif -->
                </div>
            </div>      
        </div>
    </div>
</div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Biografie
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <div class="col-xs-12">
                <div class="bio_information">
                    <h3 class="text-center">Uw verhaal als kunstenaar</h3>
                    <br>
                    <form action="{{ route('admin.create.story.artist', [$artist->id])}}" name="profile" method="POST" class="form-global form-horizontal">
                    @csrf
                        <div id="artist" class="form-global">
                        <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label required" for="shorttext">Korte beschrijving / intro</label>
                                    </div>
                                    <div class="col-sm-12">
                                    <textarea name="shorttext" id="" cols="30" rows="10" class="form-control">{{ $artist->shorttext }}</textarea>
                                                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label required" for="description">Uw biografie als kunstenaar</label>
                                    </div>
                                    <div class="col-sm-12">
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $artist->description }}</textarea>
                                                    
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-success float-right" type="submit">Opslaan</button>
                            </div>
                        </div>
                    </form>
                    <br><br>


                    <!-- @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message')}}
                            </div>
                    @endif -->
                </div>

            </div>  
 
        </div>

        
 
    </div>


  </div>

</div>
<br>
</div> <!-- end of tile -->
@endsection











































