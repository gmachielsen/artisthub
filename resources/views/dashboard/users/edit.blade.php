@extends('layouts.dashboard.app')

@section('content')
    <h2>Styles</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index')}}">Users</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
    <div class="tile mb-4">
        <form method="POST" action="{{ route('admin.users.update', $user->id)}}" enctype="multipart/form-data">
            @csrf

            @include('dashboard.partials._errors')

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name)}}">
            </div>
            <div class="form-group">
                <label>User_type</label>
                <input type="text" name="user_type" class="form-control" value="{{ old('name', $user->user_type)}}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('name', $user->email)}}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" value="{{ old('name', $user->password)}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
            </div>
        </form>
    </div> <!-- end of tile -->
@endsection