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
                        @if ($leads->count() > 0)
                            <!-- <table class="table table-hover" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead> -->
                                @foreach ($leads as $index=>$lead)
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
                <form action="{{ route('admin.lead.delete') }}" method="POST">
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
                                <!-- <tbody>
                                    <tr >
                                        <td>{{ $index+1 }}</td>
                                        <td><img src="{{ asset('uploads/artworks') }}/{{$lead->artwork->picture }}" width="50px" height="50px" style="object-fit: cover;" alt=""></td>
                                        <td>{{ Str::limit($lead->artwork->title, 30) }}</td>
                                        <td> 
                                                <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash"></i> Delete</button>
                                                <button class="btn btn-link" >Bekijk</button>
                                        </td>

                                    </tr>




                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Delete {{ $lead->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>You are going to delete {{ $lead->name }}. Are you sure?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                </tbody> -->


                                @endforeach

                                
                            <!-- </table> -->

                            
                            {{ $leads->appends(request()->query())->links() }}
                        @else
                            <h3 style="font-weight: 400;">Sorry no records found</h3>
                        @endif
                    </div>
                </div>
            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->




@endsection