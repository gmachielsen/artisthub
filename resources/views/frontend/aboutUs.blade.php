@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
<div class="row">
    <div class="cover col-sm-12 text-center">
        <h2><span>Wij zijn:</span> Kunst, creatief, veelzijdig</h2>
        <br>
    </div>
</div>
<div class="row">
    <div class="col-12">
    </div>
    <div class="col-md-6"><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur nulla accusamus velit rem possimus perspiciatis, voluptate voluptatum unde labore quia placeat odio cupiditate vel atque itaque minima quas sit autem.</p></div>
    <div class="col-md-6"><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae voluptatum, excepturi id modi animi quibusdam voluptas labore. Esse hic soluta provident nobis pariatur inventore fuga architecto. Est inventore numquam enim.</p></div>
</div>
<div class="row">
    <div class="heading col-sm-12 text-center">
    <br>
        <h4>Maak kennis met ons team</h4>
    <br>
    </div>
    <div class="row">
            @foreach($staffmembers as $staffmember)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card" style="">
                            <img src="{{ asset('avatar/Gijs.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p>{{ $staffmember->function }}</p>
                            </div>
                        </div>
                    <br>
                </div>
            @endforeach
    </div>
</div>
</div>
@endsection