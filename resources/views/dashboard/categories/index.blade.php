@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Categories</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Categories</li>
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
                                    
                                        <a href="{{ route('admin.categories.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>

                                </div>
                            </div><!-- end of row -->

                        </form><!-- end of form -->

                    </div><!-- end of col 12 -->

                </div><!-- end of row -->

                <div class="row">
                    <div class="col-md-12">
                        @if ($categories->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($categories as $index=>$category)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td><img src="{{ asset('uploads/categoryImages') }}/{{ $category->image }}" width="100px" style="width: 100px" alt=""></td>

                                        <td>{{ $category->name }}</td>
                                        <td>
                                                <a href="{{ route('admin.categories.edit', [$category->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                                <form method="post" action="" style="display: inline-block;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>
                                                </form><!-- end of form -->
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        @else
                            <h3 style="font-weight: 400;">Sorry no records found</h3>
                        @endif
                    </div>
                </div>
            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection