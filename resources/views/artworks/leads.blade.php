@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-sm-12">
                <br><br>
                    <h1 class="text-center">Overzicht van leads</h1>
                <br><br>
                    @foreach($leads as $lead)
                            @if(Auth::user()->id == $lead->artwork->user_id)
                                <div id="accordion">

                                    <div class="card"  >
                                        
                                        <div class="card-header" id="headingOne" style="display: flex; flex-direction: row;">
                                        <div><img style="width: 70px; height: 70px; background-size: cover; object-fit: cover;" src="{{ asset('uploads/artworks') }}/{{$lead->artwork->picture }}"  alt=""></div>
                                        <div>
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$lead->id}}" aria-expanded="false" aria-controls="collapseOne">
                                            {{ $lead->artwork->title }} 
                                            </button>
                                        </div>
                                        </div>

                                        <div id="collapseOne{{$lead->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">

                                        <table class="table table-striped table-dark">
                                            <thead>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Naam</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Voornaam + Achternaam</th>
                                                <th scope="col">GSM</th>
                                                <th scope="col">Telefoon</th>
                                                <th scope="col">Verwijder</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <th scope="row">1</th>
                                                <td>{{ $lead->user->name}}</td>
                                                <td>{{ $lead->user->email }}</td>
                                                <td>{{ $lead->user->profile->first_name }} {{ $lead->user->profile->last_name}}</td>
                                                <td>{{ $lead->user->profile->cell_phone }}</td>
                                                <td>{{ $lead->user->profile->phone }}</td>
                                                <td>                                            
                                                    <form action="{{ route('lead.delete') }}" method="POST">
                                                    @csrf
                                                        <input type="hidden" name="id" value="{{$lead->id}}">
                                                        <button type="submit" class="btn btn-danger">Verwijder</button>
                                                    </form>
                                                </td>
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