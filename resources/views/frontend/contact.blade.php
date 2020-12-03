@extends('layouts.app')

@section('content')



<section class="mb-4" style="padding: 30px;">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contactformulier</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Via dit contactformulier kunt u contact opnemen met artisthub</p>

    <div class="row">
    <div class="col-sm-12">
    @if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    </div>
        <!--Grid column-->
        <div class="col-md-12 mb-md-0 mb-9">
            <form id="contact-form" name="contact-form" action="{{ route('send.post')}}" method="POST">
                @csrf
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <br>
                            <label for="name" class="">Uw naam</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <br>
                            <label for="email" class="">Uw email</label>
                            <input type="text" id="email" name="email" class="form-control">
                            <input type="hidden" id="mailto" name="mailto" value="g.machielsen@gmail.com">
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <br>
                            <label for="subject" class="">Onderwerp</label>
                            <input type="text" id="subject" name="subject" class="form-control">
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <br>
                            <label for="message">Uw bericht</label>
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                        </div>

                    </div>
                </div>
                <!--Grid row-->


            <div class="text-center text-md-left">
            <br>
            <button type="submit" class="btn btn-success">Vestuur bericht</button>
            </div>
            <div class="status"></div>
        </div>
        </form>

        <!--Grid column-->

        <!--Grid column-->
        

</div>
</div>
<br><br>
<hr>
</section>
<!--Section: Contact v.2-->
<section>
<div class="container text-center">

    <div class="row">
            <div class="col-md-12 col-lg-4" style="padding-top: 25px;">
                <i class="fas fa-map-marker-alt fa-2x"></i>
                <p>Prinsenboschlaan 32, 4841 MA Prinsenbeek</p>
            </div>
            <div class="col-md-12 col-lg-4">
                <i class="fas fa-phone mt-4 fa-2x"></i>
                <p>06-11864118</p>
            </div>
            <div class="col-md-12 col-lg-4">
                <i class="fas fa-envelope mt-4 fa-2x"></i>
                <p>g.machielsen@gmail.com</p>
            </div>
 
        <!--Grid column-->
        </div>
    </div>
</div>
<br><br><br>
</section>
@endsection