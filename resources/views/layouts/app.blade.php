<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/navbar.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @stack('styles')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.7.2/css/solid.css" integrity="sha384-r/k8YTFqmlOaqRkZuSiE9trsrDXkh07mRaoGBMoDcmA58OHILZPsk29i2BsFng1B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/fontawesome.css" integrity="sha384-4aon80D8rXCGx9ayDt85LbyUHeMWd3UiBaWliBlJ53yzm9hqN21A+o1pqoyK04h+" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/06a651c8da.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">

</head>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>
<header id="header">
    <div class="header">
    <section>
      <div>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

        <p>MENU</p>
        <button><i class="fa fa-search" aria-hidden="true"></i></button>
      </div>
<div>
    	<h1>
        PURE LUXE
      </h1>
</div>

        
      <div>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registeer als kunstliefhebber') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register.as.artist') }}">{{ __('Registreer als kunstenaar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->user_type=='artist')
                                        {{ Auth::user()->artist->artist_name }}
                                    @else 
                                        {{ Auth::user()->name }} 
                                    @endif
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->user_type==='customer')
                                        <a class="dropdown-item" href="{{ route('profile.index')}}">
                                            {{ __('Profiel') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('favourites')}}">
                                            {{ __('Favorieten') }}
                                        </a>
                                        <p>{{ (Auth::user()->user_type==='customer') }}</p>
                                    @elseif(Auth::user()->user_type==='artist') 
                                        <a class="dropdown-item" href="{{ route('artist.dashboard') }}">
                                            {{ __('Dashboard') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('create.artwork') }}">Voeg kunstwerk toe</a>
                                        <a class="dropdown-item" href="{{ route('artwork.overview') }}">Uw kunstwerken</a>
                                        <a class="dropdown-item" href="{{ route('view.leads') }}">Leads</a>
                                        <a class="dropdown-item" href="{{ route('view.messages') }}">Bekijk uw berichten</a>

                                    @else
                                        <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
      </div>
    </section>

    <nav>
      <ul>
        <li>
          <a href="">CARS & YACHTS</a>
        </li>
        <li>
          <a href="">LIVING</a>
        </li>
        <li>
          <a href="">JEWELS & WATCHES</a>
        </li>
        <li>
          <a href="">DESIGN & STYLE</a>
        </li>
        <li>
          <a href="">FOOD & DRINKS</a>
        </li>
        <li>
          <a href="">TRAVEL</a>
        </li>
        <li>
          <a href="">BUSINESS & SOCIETY</a>
        </li>
        <li>
          <a href="">GEAR</a>
        </li>
      </ul>
    </nav>
    </div>
</header>

    <!-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand logoContainer" href="{{ url('/') }}">
                    <img src="https://fontmeme.com/permalink/201001/176021b0c6f1e7bc1e3722a9f61be964.png" alt="lettertypes-voor-handtekeningen" border="0">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>



                    

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registeer als kunstliefhebber') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register.as.artist') }}">{{ __('Registreer als kunstenaar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->user_type=='artist')
                                        {{ Auth::user()->artist->artist_name }}
                                    @else 
                                        {{ Auth::user()->name }} 
                                    @endif
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->user_type==='customer')
                                        <a class="dropdown-item" href="{{ route('profile.index')}}">
                                            {{ __('Profiel') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('favourites')}}">
                                            {{ __('Favorieten') }}
                                        </a>
                                        <p>{{ (Auth::user()->user_type==='customer') }}</p>
                                    @elseif(Auth::user()->user_type==='artist') 
                                        <a class="dropdown-item" href="{{ route('artist.dashboard') }}">
                                            {{ __('Dashboard') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('create.artwork') }}">Voeg kunstwerk toe</a>
                                        <a class="dropdown-item" href="{{ route('artwork.overview') }}">Uw kunstwerken</a>
                                        <a class="dropdown-item" href="{{ route('view.leads') }}">Leads</a>
                                        <a class="dropdown-item" href="{{ route('view.messages') }}">Bekijk uw berichten</a>

                                    @else
                                        <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->



        <main class="py-4" style="margin: 0;">
            <router-view></router-view>

            @yield('content')
            @extends('footer')

        </main>
    </div>
</body>
</html>
