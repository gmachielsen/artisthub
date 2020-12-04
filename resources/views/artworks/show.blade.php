@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
<div class="row">
        <div class="col-sm-12">
        <h1>{{$artwork->title}}</h1>
                @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message')}}
                        </div>
                @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <img src="{{ asset('artworks/Paard.jpg')}}" class="card-img-top" alt="...">
        </div>
        <div class="col-xs-12 col-md-6">
        <a href="#"data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-envelope-square" style="font-size: 34px;float:right;color:green;"></i></a>
        <br>
            <h5>{{$artwork->description}}</h5>
        <br><br><br>
            <hr>
                <div class="row specificaties">
                    <br>
                    <br>
                    <div class="col-sm-12 text-center">
                        <h2>Specificaties</h2>
                    </div>
<br>
<br>
                    <div class="info">
                        <div>Stijl</div>
                        <div>{{ $artwork->technic->name }}</div>
                    </div>
                    <div class="info">
                        <div>Stijl</div>
                        <div>{{ $artwork->style->name }}</div>
                    </div>
                    <div class="info">
                        <div>Stijl</div>
                        <div>{{ $artwork->category->name }}</div>
                    </div>
                    <div class="info">
                        <div>Jaar</div>
                        <div>{{ $artwork->year }}</div>
                    </div>
                    <div class="info">
                        <div class="breedte">breedte  </div>
                        <div class="breedtecm">{{ $artwork->width }}</div>
                    </div>
                    <div class="info">
                        <div class="hoogte">hoogte</div>
                        <div class="hoogtecm">{{ $artwork->height }}</div>   
                    </div>
                    <div class="maten">
                        <p>Ingelijst: {{ $artwork->framed }}</p>
                    </div>
                </div>
                <br>
                <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      @if(Auth::check()&&Auth::user()->user_type=='customer')
                    <form action="{{ route('send.message.profile', [$artwork->id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="email" class="form-group">
                        <div class="form-group">
                            <label for="phone">Uw telefoonnummer</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Uw bericht</label>
                            <input type="text" name="message" class="form-group">
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 100%;">Vestuur bericht</button>
                    </form>

                    <form action="{{ route('save.artwork', [$artwork->id])}}" method="POST">
                        @csrf
                        <button type="submit">test</button>
                    </form>

                @else
                    <form action="{{ route('send.message', [$artwork->id])}}" method="POST">
                        @csrf
                        <div class="form-group col-sm-12">
                            <label for="name">Uw naam</label>
                            <input type="text" name="name" class="form-group">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="phone">Uw telefoonnummer (niet verplicht)</label>
                            <input type="text" name="phone" class="form-group">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="email">Uw email</label> 
                            <input type="email" name="email" class="form-group">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="message">Uw bericht</label>
                            <input type="text" name="message" class="form-group">
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 100%;">Vestuur bericht</button>
                    </form>
                @endif      </div>
    </div>
  </div>


</div>
              

                @if(Auth::check()&&Auth::user()->user_type=='customer')
                    @if(!$artwork->checkApplication())
                    <form action="{{ route('artwork.request', [$artwork->id, $artwork->user_id])}}" method="POST">

                        @csrf
                        <button type="submit" class="btn btn-success" style="width: 100%;">Ik heb interesse</button>
                    </form>
                    @else 
                    <form action="" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" style="width: 100%;">Ik heb geen interesse meer</button>
                    </form>
                    @endif
                @endif
                <!-- <div style="display: flex; flex-direction: column;">
                    <a type="button" href="{{ route('rent.artwork', [$artwork->id])}}">Huur kunstwerk</a>
                    <br>
                    <a type="button" href="{{ route('buy.artwork', [$artwork->id])}}">Koop kunstwerk</a>
                    <br>
                </div> -->

                   
                @if(Auth::check()&&Auth::user()->user_type='customer')
                <favourite-component :artworkid={{ $artwork->id }}
                :favorited={{$artwork->checkSaved()?'true':'false'}}></favourite-component>

                @endif

              

            </div>
        </div>
        <hr>
        <div class="col-xs-12 text-center">
            <a type="button" href="{{ route('artist.show', [$artwork->artist->id, $artwork->artist->slug])}}">Meer over {{  $artwork->artist->artist_name }}</a>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send job to your friend</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('mail') }}" method="POST">@csrf
        <div class="modal-body">
          <input type="hidden" name="artwork_id" value="{{$artwork->id}}">
          <input type="hidden" name="artwork_slug" value="{{$artwork->slug}}">
          <div class="form-group">
            <label>Your name *</label>
            <input type="text" name="your_name" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Your mail *</label>
            <input type="email" name="your_email" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Person name *</label>
            <input type="text" name="friend_name" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Person email *</label>
            <input type="email" name="friend_email" class="form-control" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Mail this job</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
