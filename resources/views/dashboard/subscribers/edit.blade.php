@extends('layouts.dashboard.app')

@section('content')
    <h2>Subscribers</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.subscribers.index')}}">Subscribers</a></li>
            <li class="breadcrumb-item active">Update</li>
        </ol>
    </nav>
    <div class="tile mb-4">
        <form method="POST" action="{{ route('admin.subscribers.update', [$subscriber->id])}}" enctype="multipart/form-data">
            @csrf
            @include('dashboard.partials._errors')

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ $subscriber->email }}">
            </div>
           
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Update</button>
            </div>
        </form>
    </div> <!-- end of tile -->
@endsection