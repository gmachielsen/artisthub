@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('js/navbar.js') }}"></script>
@endpush
@section('content')

<div class="container-fluid" style="padding: 0; margin:0;">
    <img name="slide" alt="" style="height: 100vh; width: 100%; object-fit: cover;">
        <div class="coverup">
            <div class="covertitle">
                <h1>Artisthub </h1>
            </div>
            <div class="covertext text">
                <p>De plek om kunst op te doen</p>
            </div>
        </div>
</div>
<br><br>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto text-center mb-5 section-heading">
        <h2 class="mb-5">Populaire Stijlen</h2>

        </div>
    </div>
    <!-- <div class="row">
        @foreach($categories as $category)
        <div class="col-6 col-md-4 category" data-aos="fade-up" data-aos-delay="800">
        <a href="{{ route('category.index', [$category->id])}}" class="h-100 feature-item">
            <div class="card" style="">
                <img src="{{ asset('uploads/categoryImages') }}/{{ $category->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h2 class="card-title">{{$category->name}}</h2>

                </div>
            </div>
            <br>
        </a>
        </div>
        @endforeach
    </div> -->
    <div class="row">
        @foreach($styles as $style)
        <div class="col-12 col-md-6 category" data-aos="fade-up" data-aos-delay="800">
        <a href="{{ route('style.index', [$style->id])}}" class="h-100 feature-item">
            <div class="card" style="">
                <img src="{{ asset('uploads/styleImages') }}/{{ $style->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h2 class="card-title">{{$style->name}}</h2>

                </div>
            </div>
            <br>
        </a>
        </div>
        @endforeach
    </div>
    <br><br><br>
    </div>

<!-- route('category.index', [$category->id]) -->
<!-- <div class="container-fluid">
    <div class="row">
        @foreach($artworks as $artwork)
        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <a href="{{ route('artworks.show', [$artwork->id, $artwork->slug])}}">
                <div class="card" style="">
                    <img src="{{ asset('artworks/Paard.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $artwork->artist->artist_name }}</h5>
                        <p>€ {{ $artwork->price }} / € {{ $artwork->rent }}</p>

                    </div>
                </div>
            </a>
            <br>
        </div>
        @endforeach
    </div> -->


    <!-- vvvv -->

<!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"> -->

  <!-- <ol class="carousel-indicators">
   @foreach( $artworks as $artwork )
      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
   @endforeach
  </ol> -->

  <!-- <div class="container carousel-inner" role="listbox">
    <div class="row">
    @foreach ($artworks as $artwork)

        @foreach( $artworks->take(4) as $artwork )
       <div class="col-6 col-md-4 col-lg-3 col-xl-2 carousel-item {{ $loop->first ? 'active' : '' }}">
           <img class="d-block img-fluid" src="{{ asset('artworks/Paard.jpg')}}" >
              <div class="carousel-caption d-none d-md-block">
              <h5 class="card-title">{{ $artwork->artist->artist_name }}</h5>
                        <p>€ {{ $artwork->price }} / € {{ $artwork->rent }}</p>
              </div>
       </div>
       @endforeach
       @endforeach

       </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="carousel slide" data-ride="carousel">
   <div class="carousel-inner">
       <div class="carousel-item active">
           <div class="row">
               <div class="col"><img src=".." alt="1 slide"></div>
               <div class="col"><img src=".." alt="2 slide"></div>
               <div class="col"><img src=".." alt="3 slide"></div>
           </div>
           <div class="row">
               <div class="col"><img src=".." alt="4 slide"></div>
               <div class="col"><img src=".." alt="5 slide"></div>
               <div class="col"><img src=".." alt="6 slide"></div>
           </div>
       </div>
   </div>
</div> -->
    <!-- vvvv -->

    <!-- vvvv -->

  
    <div class="row-fluid">

        <div class="collection">
            <h2>Een greep uit onze collectie</h2>
        </div>
    <div id="productSlider" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner row w-100 mx-auto" style="padding: 0 margin:0;">
            @foreach($artworks->chunk(4) as $artworkCollections)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

                    <div class="row" style="padding: 0 margin:0;">
                        @foreach($artworkCollections as $artwork)
                        <div class="artwork col-6 col-lg-3">
                         <div class="col mx-1 my-5">
                         <a href="{{ route('artworks.show', [$artwork->id, $artwork->slug])}}">
                            <div class="card" style="">
                            @if(!empty($artwork->picture))
                            <img src="{{ asset('uploads/artworks') }}/{{ $artwork->picture }}" class="card-img-top" alt="...">

                            @else 
                            <img src="{{ asset('artworks/Paard.jpg')}}" class="card-img-top" alt="...">

                            @endif                                <div class="card-body">
                                    <h5 class="card-title">{{ $artwork->artist->artist_name }}</h5>
                                    <p>€ {{ $artwork->price }} / € {{ $artwork->rent }}</p>

                                </div>
                            </div>
                        </a>
                         </div>
                         </div>
                        @endforeach
                    </div>

                </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#productSlider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#productSlider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
</div>
</div>




    <!-- vvvv -->
    












    <div class="row justify-content-center">
        <br><br>
        <a href="{{ route('all.artworks')}}"><button>Browse door onze kunstwerken</button></a>
        <br><br>
    </div>
<br><br>





<br><br>
    <div class="row-fluid">
    <div class="collection">
            <h2>Onze kunstenaars</h2>
        </div>
    <div id="productSlider" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner row w-100 mx-auto" style="padding: 0 margin:0;">
            @foreach($artists->chunk(4) as $artistCollections)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

                    <div class="row" style="padding: 0 margin:0;">
                        @foreach($artistCollections as $artist)
                        <div class="artist col-6 col-lg-3">
                         <div class="col mx-1 my-5">
                         <a href="{{ route('artist.show', [$artist->id, $artist->slug])}}">
                            <div class="card" style="">
                                <img src="{{ asset('uploads/profilephoto') }}/{{ $artist->profile_photo }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $artist->artist_name }}</h5>
                                </div>
                            </div>
                        </a>
                         </div>
                         </div>
                        @endforeach
                    </div>

                </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#productSlider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#productSlider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
</div>
</div>
<div class="row justify-content-center">
        <a  href="{{ route('all.artists')}}"><button>Browse door onze kunstenaars</button></a>
    </div>
    <br><br><br>

<!-- <div class="container-fluid" style="padding: 0 margin:0;">
    <div class="row" style="padding: 0 margin:0;">
        @foreach($artists as $artist)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <a type="button" href="{{ route('artist.show', [$artist->id, $artist->slug])}}">

                    <div class="card" style="">
                        <img src="{{ asset('uploads/profilephoto') }}/{{ $artist->profile_photo }}" width="100px" artwork="width: 100px" alt="">
                        <div class="card-body">
                            <p>{{ $artist->artist_name }}</p>
                        </div>
                    </div>
                </a>
                <br>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <br><br>
        <a  href="{{ route('all.artists')}}"><button>Browse door onze kunstenaars</button></a>
        <br><br>
    </div>
</div> -->
@endsection
