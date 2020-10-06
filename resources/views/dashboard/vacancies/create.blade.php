@extends('layouts.dashboard.app')

@section('content')
    <h2>Vacancies</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.vacancies.index')}}">Vacancies</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>
    <div class="tile mb-4">
        <form method="POST" action="{{ route('admin.vacancies.store')}}" enctype="multipart/form-data">
            @csrf
            @include('dashboard.partials._errors')

            <div class="form-group">
                <label>Jobtitle</label>
                <input type="text" name="jobtitle" class="form-control" value="{{ old('jobtitle')}}">
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="hidden" name="jobdescription" id="jobdescription" cols="30" rows="10"></input>
                <input id="short_desc" type="hidden" name="jobdescription">
                <trix-editor input="short_desc" placeholder="short description"></trix-editor>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type">
                    <option value="fulltime">fulltime</option>
                    <option value="parttime">parttime</option>
                    <option value="casual">casual</option>
                </select>
            </div>
            <div class="form-group">
                <label>Hours per week</label>
                <input type="text" name="hours" class="form-control" value="{{ old('hours')}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
            </div>
        </form>
    </div> <!-- end of tile -->
@endsection