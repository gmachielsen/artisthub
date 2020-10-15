@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="artwork">
                <div class="image">
                    <img src="{{ asset('uploads/artworks') }}/{{ $artwork->picture }}" width="100px" artwork="width: 100px" alt="">
                </div>
                <div class="header">
                    <h4>{{ $artwork->artist->artist_name }}</h4>
                    <h1>{{ $artwork->title }}</h1>
                </div>
                <div class="content">
                    <ul>
                        <li>
                            <span class="divider"></span>
                        </li>
                        <li>
                            <label for="rent">Abonnement</label>
                            <span>{{ $artwork->rent }} euro,-</span>
                        </li>
                        <li>
                            <label for="">Verzending binnen Nederland</label>
                            <span>Gratis</span>
                        </li>
                        <li>
                            <span class="divider"></span>
                        </li>
                        <li>
                            <label for="total">Totaal</label>
                            <span>{{ $artwork->rent }} euro,-</span>
                        </li>
                    </ul>
                    <br>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus ullam voluptatem quidem totam iste labore ab. Incidunt reprehenderit accusamus esse totam deserunt, quisquam quia quam. Nam, fuga minima? Dolores, aliquid!</p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="rent_details">
                <div class="header">
                    <h1>Huur dit werk</h1>
                    <span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad, laborum voluptate. Ratione iure officia temporibus incidunt! Soluta fugiat consequatur possimus culpa dignissimos, doloribus officia distinctio excepturi impedit repellat blanditiis pariatur?</p>
                        <br>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti reprehenderit ad aperiam neque vitae itaque labore, porro fuga ex quibusdam, aliquam veniam deserunt laudantium atque voluptatum vel praesentium. Nobis, hic?</p>
                    </span>
                </div>
                <div class="content">
                    @if(Auth::check()&&Auth::user()->user_type=='customer')
                    <form action="{{ route('rent.it', [$artwork->id])}}" method="post">
                        <div class="form-group">
                        <label for="title">name</label>
                            <input type="text" name="name" class="form-control
                            {{ $errors->has('name') ? ' is-invalid' : '' }}" 
                            value="{{ old('name', Auth::user()->name) }}"
                            placeholder="naam">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="title">email</label>
                            <input type="text" name="email" class="form-control
                            {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                            value="{{ old('email', Auth::user()->email) }}"
                            placeholder="e-mailadres">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="cell_phone">Mobiel nummer</label>
                            <input type="text" name="cell_phone" class="form-control
                            {{ $errors->has('cell_phone') ? ' is-invalid' : '' }}" 
                            value="{{ old('cell_phone', Auth::user()->profile->cell_phone) }}"
                            placeholder="mobiel">
                            @if ($errors->has('cell_phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cell_phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="phone">Telefoonnummer</label>
                            <input type="text" name="phone" class="form-control
                            {{ $errors->has('phone') ? ' is-invalid' : '' }}" 
                            value="{{ old('phone', Auth::user()->profile->phone) }}"
                            placeholder="telefoonnummer">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="street">Straat</label>
                            <input type="text" name="street" class="form-control
                            {{ $errors->has('street') ? ' is-invalid' : '' }}" 
                            value="{{ old('street', Auth::user()->profile->street_name) }}"
                            placeholder="straat">
                            @if ($errors->has('street'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('street') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="housenumber">Huisnummer</label>
                            <input type="text" name="housenumber" class="form-control
                            {{ $errors->has('housenumber') ? ' is-invalid' : '' }}" 
                            value="{{ old('housenumber', Auth::user()->profile->house_number ) }}"
                            placeholder="huisnummer">
                            @if ($errors->has('housenumber'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('housenumber') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="postal_code">Postcode</label>
                            <input type="text" name="postal_code" class="form-control
                            {{ $errors->has('postal_code') ? ' is-invalid' : '' }}" 
                            value="{{ old('postal_code', Auth::user()->profile->postal_code) }}"
                            placeholder="postcode">
                            @if ($errors->has('postal_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="city">Plaats</label>
                            <input type="text" name="city" class="form-control
                            {{ $errors->has('city') ? ' is-invalid' : '' }}" 
                            value="{{ old('city', Auth::user()->profile->city) }}"
                            placeholder="plaats">
                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="country">Land</label>
                            <input type="text" name="country" class="form-control
                            {{ $errors->has('country') ? ' is-invalid' : '' }}" 
                            value="{{ old('country', Auth::user()->profile->country) }}"
                            placeholder="land">
                            @if ($errors->has('country'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="comment">Opmerkingen</label>
                            <textarea name="comment" id="" cols="30" rows="10" class="form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}" 
                            value="{{ old('comment') }}" placeholder="Opmerkingen"></textarea>
                            @if ($errors->has('comment'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('comment') }}</strong>
                                </span>
                            @endif
                        </div>
                        <input type="hidden" name="type" value="rent" id="type">
                        <div class="form-group">
                            <button class="btn btn-success float-right" type="submit">Huur kunstwerk</button>
                        </div>
                    </form>


                    @else


                    <form action="{{ route('rent.it', [$artwork->id])}}" method="post">
                        <div class="form-group">
                        <label for="title">name</label>
                            <input type="text" name="name" class="form-control
                            {{ $errors->has('name') ? ' is-invalid' : '' }}" 
                            value="{{ old('name') }}"
                            placeholder="naam">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="title">email</label>
                            <input type="text" name="email" class="form-control
                            {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                            value="{{ old('email') }}"
                            placeholder="e-mailadres">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="title">Mobiel nummer</label>
                            <input type="text" name="cell_phone" class="form-control
                            {{ $errors->has('cell_phone') ? ' is-invalid' : '' }}" 
                            value="{{ old('cell_phone') }}"
                            placeholder="mobiel">
                            @if ($errors->has('cell_phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cell_phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="title">Telefoonnummer</label>
                            <input type="text" name="phone" class="form-control
                            {{ $errors->has('phone') ? ' is-invalid' : '' }}" 
                            value="{{ old('phone') }}"
                            placeholder="telefoonnummer">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="title">Straat</label>
                            <input type="text" name="street" class="form-control
                            {{ $errors->has('street') ? ' is-invalid' : '' }}" 
                            value="{{ old('street') }}"
                            placeholder="straat">
                            @if ($errors->has('street'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('street') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="title">Huisnummer</label>
                            <input type="text" name="housenumber" class="form-control
                            {{ $errors->has('housenumber') ? ' is-invalid' : '' }}" 
                            value="{{ old('housenumber') }}"
                            placeholder="huisnummer">
                            @if ($errors->has('housenumber'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('housenumber') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="title">Postcode</label>
                            <input type="text" name="postal_code" class="form-control
                            {{ $errors->has('postal_code') ? ' is-invalid' : '' }}" 
                            value="{{ old('postal_code') }}"
                            placeholder="postcode">
                            @if ($errors->has('postal_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="title">Plaats</label>
                            <input type="text" name="city" class="form-control
                            {{ $errors->has('city') ? ' is-invalid' : '' }}" 
                            value="{{ old('city') }}"
                            placeholder="plaats">
                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="title">Land</label>
                            <input type="text" name="country" class="form-control
                            {{ $errors->has('country') ? ' is-invalid' : '' }}" 
                            value="{{ old('country') }}"
                            placeholder="land">
                            @if ($errors->has('country'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="comment">Opmerkingen</label>
                            <textarea name="comment" id="" cols="30" rows="10" class="form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}" 
                            value="{{ old('comment') }}" placeholder="Opmerkingen"></textarea>
                            @if ($errors->has('comment'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('comment') }}</strong>
                                </span>
                            @endif
                        </div>
                        <input type="hidden" name="type" value="rent" id="type">
                        <div class="form-group">
                            <button class="btn btn-success float-right" type="submit">Huur kunstwerk</button>
                        </div>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection