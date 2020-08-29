@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
                            @foreach($artworks as $artwork)
                            <tr>
                                <td>
                                <img src="{{ asset('uploads/artworks') }}/{{$artwork->picture }}" width="100px" style="width: 100px" alt="">
                                
                                <td>Position: {{ $artwork->title }}
                                    <br>
                                </td>
                                <td>

                                    <a href="{{ route('artworks.show', [$artwork->id, $artwork->slug])}}"><button class="btn btn-success btn-sm">Bekijk</button></a>
                                    <a href="{{ route('artwork.edit', [$artwork->id])}}"><button class="btn btn-dark">Aanpassen</button></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection