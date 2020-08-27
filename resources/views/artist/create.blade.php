@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="display: block;">
        <div class="col-xs-12">
        <br><br>
            <h1 class="text-center">Mijn Account</h1>
        </div>
    </div>
</div>
<br>
<br>  
<div class="container">
    <div class="row">
        <div class="col-sm-12">
                @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message')}}
                        </div>
                @endif
        </div>
    </div>
    <div class="row profile_image_row" style="display: flex; justify-content: center">
        <div class="col-xs-12 content-center">
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
    <br><br><br><hr><br><br><br>

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
                    <form action="{{ route('create.personal.information')}}" name="profile" method="POST" class="form-global form-horizontal">
                    @csrf
                        <div id="artist" class="form-global">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="first_name">Artiestnaam</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="uw naam als kunstenaar" name="artist_name" class="form-control" value="{{ Auth::user()->artist->artist_name }}">    
                                                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="first_name">Voornaam</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="voornaam" name="first_name" class="form-control" value="{{ Auth::user()->artist->first_name }}">    
                                                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="last_name">Achternaam</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="achternaam" name="last_name" class="form-control" value="{{ Auth::user()->artist->last_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="YearOfBirth">Geboortejaar</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Uw geboortejaar" name="YearOfBirth" class="form-control" value="{{ Auth::user()->artist->YearOfBirth }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="e-mail">e-mail</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="email" placeholder="email" name="email" class="form-control" value="{{ Auth::user()->artist->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="GSM">GSM</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="mobiel-nummer" name="GSM" class="form-control" value="{{ Auth::user()->artist->GSM }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="phone">Telefoon</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="telefoon-nummer" name="phone" class="form-control" value="{{ Auth::user()->artist->phone }}">
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
                    <form action="{{ route('create.company.information')}}" name="profile" method="POST" class="form-global form-horizontal">
                    @csrf
                    <div class="form-global">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="website">Uw website</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="uw website" name="website" class="form-control" value="{{ Auth::user()->artist->website }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="company_name">Uw bedrijfsnaam</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="uw bedrijfsnaam" name="company_name" class="form-control" value="{{ Auth::user()->artist->company_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="businessnumber">Uw kvk-nummer</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="uw kvk-nummer" name="businessnumber" class="form-control" value="{{ Auth::user()->artist->businessnumber }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="taxnumber">Uw btw indificatienummer</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Uw btw indificatienummer" name="taxnumber" class="form-control" value="{{ Auth::user()->artist->taxnumber }}">
                                    </div>
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="street_name">Straatnaam</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="uw straatnaam" name="street_name" class="form-control" value="{{ Auth::user()->artist->street_name }}">    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="first_name">Postcode</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="uw postcode" name="postal_code" class="form-control" value="{{ Auth::user()->artist->postal_code }}">    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="house_number">Huisnummer (met toevoeging)</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Huisnumber (Met eventueel gebouwnummer en toevoeging indien nodig)" name="house_number" class="form-control" value="{{ Auth::user()->artist->house_number }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="city">Plaatsnaam</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Uw plaatsnaam" name="city" class="form-control" value="{{ Auth::user()->artist->city }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="country">Land</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="land" name="country" class="form-control" value="{{ Auth::user()->artist->country }}">
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
                    <form action="{{ route('create.story.artist')}}" name="profile" method="POST" class="form-global form-horizontal">
                    @csrf
                        <div id="artist" class="form-global">
                        <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label required" for="shorttext">Korte beschrijving / intro</label>
                                    </div>
                                    <div class="col-sm-12">
                                    <textarea name="shorttext" id="" cols="30" rows="10" class="form-control">{{ Auth::user()->artist->shorttext }}</textarea>
                                                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label required" for="description">Uw biografie als kunstenaar</label>
                                    </div>
                                    <div class="col-sm-12">
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ Auth::user()->artist->description }}</textarea>
                                                    
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
<br><br>
<hr>
<br><br>
<div class="row">
    <div class="website_url">
        <a href="company/{{ Auth::user()->artist->slug }}">Bekijk uw profiel op dit platform</a>
    </div>
</div>  


        
<!-- <div class="col-xs-12">
                <div class="profile_information">
                    <h3 class="text-center">Uw profielgegevens</h3>
                    <br>
                    <form action="{{ route('profile.create')}}" name="profile" method="POST" class="form-global form-horizontal">
                    @csrf
                        <div id="artist" class="form-global">
                        <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="first_name">Artiestnaam</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="uw naam als kunstenaar" name="artist_name" class="form-control" value="">    
                                                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="first_name">Voornaam</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="voornaam" name="first_name" class="form-control" value="">    
                                                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="first_name">Achternaam</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="achternaam" name="last_name" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="YearOfBirth">Geboortejaar</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="number" placeholder="Uw geboortejaar" name="YearOfBirth" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="e-mail">e-mail</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="email" placeholder="email" name="email" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="cell_phone">GSM</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="mobiel-nummer" name="cell_phone" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="phone">Telefoon</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="telefoon-nummer" name="phone" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="website">Uw website</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="uw website" name="website" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="company_name">Uw bedrijfsnaam</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="uw bedrijfsnaam" name="company_name" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="businessnumber">Uw kvk-nummer</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="uw kvk-nummer" name="businessnumber" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="control-label required" for="taxnumber">Uw btw indificatienummer</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Uw btw indificatienummer" name="taxnumber" class="form-control" value="">
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
                    @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message')}}
                            </div>
                    @endif
            </div> 


        <div class="col-xs-12">
            <div class="address_information">
                <h3 class="text-center">Uw bedrijfsadres</h3>
                <br>
                <form action="{{ route('profile.create')}}" name="profile" method="POST" class="form-global form-horizontal">
                @csrf
                    <div id="artist" class="form-global">
                    <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="street_name">Straatnaam</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="uw straatnaam" name="street_name" class="form-control" value="">    
                                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="first_name">Postcode</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="uw postcode" name="postal_code" class="form-control" value="">    
                                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="house_number">Huisnummer (met toevoeging)</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Huisnumber (Met eventueel gebouwnummer en toevoeging indien nodig)" name="house_number" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="city">Plaatsnaam</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="number" placeholder="Uw plaatsnaam" name="city" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label required" for="country">Land</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="email" placeholder="land" name="country" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-success float-right" type="submit">Opslaan</button>
                        </div>
                    </div>
                </form>
                @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message')}}
                        </div>
                @endif
        </div>
    </div>
<br><br>
        <div class="col-xs-12">
            <div class="bio_information">
                <h3 class="text-center">Uw verhaal als kunstenaar</h3>
                <br>
                <form action="{{ route('profile.create')}}" name="profile" method="POST" class="form-global form-horizontal">
                @csrf
                    <div id="artist" class="form-global">
                    <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label required" for="street_name">Korte beschrijving</label>
                                </div>
                                <div class="col-sm-12">
                                <textarea name="description" id="" cols="30" rows="10" class="form-control" value=""></textarea>
                                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label required" for="first_name">Uw biografie als kunstenaar</label>
                                </div>
                                <div class="col-sm-12">
                                <textarea name="description" id="" cols="30" rows="10" class="form-control" value=""></textarea>
                                                 
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-success float-right" type="submit">Opslaan</button>
                        </div>
                    </div>
                </form>
                @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message')}}
                        </div>
                @endif
            </div>
        </div> -->
     
<br><br>



@endsection
