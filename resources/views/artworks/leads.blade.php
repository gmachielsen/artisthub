@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                @foreach($leads as $lead)
                <div class="card-header"><p>$lead->id</p></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection