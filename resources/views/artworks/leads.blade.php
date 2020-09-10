@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                

            <div class="card-body">
                    <table class="table">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                        
                            @foreach($leads as $lead)
                                @if(Auth::user()->id == $lead->artwork->user_id)
                                <tr>
                                {{$lead->artwork->user_id }}
                                {{ $lead->id }}

                                {{ $lead->artwork_id }}
                                {{ $lead->user_id }}
                                <td>
                                {{ $lead->artwork->title }} 
                                    </td>
                                    <td>
                               {{ $lead->user->profile->email }}


                                    </td>
                                    <td>

                                    </td>
                                    <td>        
                                        <form action="{{ route('lead.delete') }}" method="POST">
                                        @csrf
                                        
                                            <input type="hidden" name="id" value="{{$lead->id}}">
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                    </tr>
                                @endif

                            @endforeach


                        </tbody>
                    </table>


                    @foreach($leads as $lead)
                                        @if(Auth::user()->id == $lead->artwork->user_id)
                                <div id="accordion">

                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$lead->id}}" aria-expanded="false" aria-controls="collapseOne">
                                            Collapsible Group Item #1
                                            </button>
                                        </h5>
                                        </div>

                                        <div id="collapseOne{{$lead->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                        </div>
                                    </div>

                                </div>
                                @endif
                        @endforeach






                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection