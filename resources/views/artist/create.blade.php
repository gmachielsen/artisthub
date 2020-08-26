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
    <div class="row">
        <div class="col-xs-12 col-xl-6">
            <div class="contact_details">
                <h3 class="text-center">Contact details</h3>
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
                        <br>
                        <div class="form-group">
                            <button class="btn btn-success float-right" type="submit">Opslaan</button>
                        </div>
                    </div>
                </form>
                <!-- @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message')}}
                        </div>
                @endif -->
            </div>
        </div>
        <div class="col-xs-12 col-xl-6">
            <div class="address_information">
                <h3 class="text-center">Bezorg adress</h3>
                <br>
                <form action="{{ route('profile.create.address')}}" name="profile" method="POST" class="form-global form-horizontal">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="control-label required" for="full_name">Volledige naam</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" placeholder="volledige naam" name="full_name" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="control-label required" for="postal_code">Postcode</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" placeholder="uw postcode" name="postal_code" class="form-control" value="">
                        </div>
                    </div>
                </div>
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
                            <label class="control-label required" for="house_number">Huisnummer</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" placeholder="uw huisnummer" name="house_number" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="control-label required" for="city">Stad of dorp</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" placeholder="uw stad of dorp" name="city" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="control-label required" for="state">Provincie</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" placeholder="uw provincie" name="state" class="form-control">
                        </div>
                    </div>
                </div> -->
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="control-label required" for="country">Land</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" placeholder="uw land" name="country" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-success float-right" type="submit">Opslaan</button>
                </div>
            </div>
            </form>
                <!-- @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message')}}
                        </div>
                @endif -->
        </div> 
    </div>
</div>

@endsection
