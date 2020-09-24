@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Leads</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Leads</li>
        {{--<li class="breadcrumb-item active">Data</li>--}}
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile mb-4">

                <div class="row">

                    <div class="col-12">

                        <form action="">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="search" autofocus class="form-control" placeholder="search" value="{{ request()->search }}">
                                    </div>
                                </div><!-- end of col -->

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                    

                                </div>
                            </div><!-- end of row -->

                        </form><!-- end of form -->

                    </div><!-- end of col 12 -->

                </div><!-- end of row -->

                <div class="row">
                    <div class="col-md-12" >
                        @if ($messages->count() > 0)
                            <!-- <table class="table table-hover" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead> -->
                                @foreach($messages as $message)
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
                                                    <form action="{{ route('admin.message.delete') }}" method="POST">
                                                    @csrf
                                                        <input type="hidden" name="id" value="{{$message->id}}">
                                                        <button type="submit" class="btn btn-danger">Delete message</button>
                                                    </form>
                                        </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach

                                
                            <!-- </table> -->

                            
                            {{ $messages->appends(request()->query())->links() }}
                        @else
                            <h3 style="font-weight: 400;">Sorry no records found</h3>
                        @endif
                    </div>
                </div>
            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->




@endsection