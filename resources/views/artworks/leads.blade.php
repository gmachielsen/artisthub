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
                            <tr>
                                <td>
                                <img src="{{ asset('uploads/artworks') }}/{{$lead->picture }}" width="100px" style="width: 100px" alt="">
                                </td>
                                <td>{{ $lead->title }}</td>
                                <td>
                                    <a href="{{ route('lead.view', [$lead->user_id]) }}"><button class="btn btn-dark">bekijk contactgegevens</button></a>
                                </td>
                                <td>
                                    <a href="{{ route('delete.lead', [$lead->id])}}"><button class="btn btn-success">Delete</button></a>

                                </td>
                                <td>        
                                    <form action="{{ route('lead.delete') }}" method="POST">
                                    @csrf
                                    
                                        <input type="hidden" name="id" value="{{$lead->id}}">
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                            </tr>


                            @endforeach


                        </tbody>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection


