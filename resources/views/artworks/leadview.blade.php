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
                            <tr>
                                <td>
                                </td>
                                <td>{{ $profile->first_name }}</td>

                            </tr>



                        </tbody>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection


