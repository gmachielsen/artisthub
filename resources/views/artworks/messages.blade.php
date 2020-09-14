@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-sm-12">
                <br><br>
                    <h1 class="text-center">Overzicht van Berichten</h1>
                <br><br>
                @foreach($messages as $message)
                            @if(Auth::user()->id == $message->artwork->user_id)
                                <div id="accordion">

                                    <div class="card"  >
                                        
                                        <div class="card-header" id="headingOne" style="display: flex; flex-direction: row;">
                                        <div><img style="width: 70px; height: 70px; background-size: cover; object-fit: cover;" src="{{ asset('uploads/artworks') }}/{{$message->artwork->picture }}"  alt=""></div>
                                        <div>
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$message->id}}" aria-expanded="false" aria-controls="collapseOne">U heeft een bericht gekregen van {{ $message->user->name }} op 
                                            {{ $message->artwork->title }} 
                                            </button>
                                        </div>
                                        </div>

                                        <div id="collapseOne{{$message->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">

                                        <table class="table table-striped table-light">
                                            <thead>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Naam</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">GSM</th>
                                                <th scope="col">Telefoon</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <th scope="row">1</th>
                                                <td>{{ $message->name}}</td>
                                                <td>{{ $message->email }}</td>
                                                <td>{{ $message->user->profile->cell_phone }}</td>
                                                <td>{{ $message->user->profile->phone }}</td>
                                                

                                                </tr>
                                                <!-- <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                                </tr>
                                                <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                                </tr> -->
                                            </tbody>

                                        </table>
                                        <table class="table">
                                        <thead>
                                                <tr>
                                                    <th scope="col">Bericht</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <td>{{ $message->message }}</td>

                                            </tbody> 
                                        </table>
                                                    <form action="{{ route('message.delete') }}" method="POST">
                                                    @csrf
                                                        <input type="hidden" name="id" value="{{$message->id}}">
                                                        <button type="submit" class="btn btn-danger">Verwijder</button>
                                                    </form>
                                        </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                    @endforeach
        </div>
    </div>
</div>
@endsection