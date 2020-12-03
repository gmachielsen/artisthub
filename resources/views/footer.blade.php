@push('styles')
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
@endpush




<footer class="page-footer font-small black" style="background-color: black; font-family: proxima-nova,sans-serif;">
    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content">
                        <h2>Blijf op de hoogte</h2>
                        <p>Schrijf je in voor onze nieuwsbrief en volg ons op social media</p>
                        <div class="subscribe input-group mb-3">
                            <input type="text" class="form-control" placeholder="Uw emailadres" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">Button</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!-- Footer Links -->
  <div class="container">

    <!-- Grid row-->
    <div class="row text-center d-flex justify-content-center pt-5 mb-3">

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight">
          <a href="{{ route('frontend.about')}}">Over ons</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight">
          <a href="{{ route('all.artworks')}}">Kunstwerken</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight">
          <a href="#!">Voor bedrijven</a>
        </h6>
      </div>
      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight">
          <a href="{{ route('all.artists')}}">Kunstenaars</a>
        </h6>
      </div>
      
      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight">
          <a href="#!">Voor kunstenaars</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight">
          <a href="{{ route('contact')}}">Contact</a>
        </h6>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->
    <hr class="rgba-white-light" style="margin: 0 15%;">

    <!-- Grid row-->
    <!-- <div class="row d-flex text-center justify-content-center mb-md-0 mb-4"> -->

      <!-- Grid column -->
      <!-- <div class="col-md-8 col-12 mt-5">
        <p style="line-height: 1.7rem">Alle rechten voorbehouden.

Algemene voorwaarden
Privacy & Cookies</p>
      </div> -->
      <!-- Grid column -->

    <!-- </div> -->
    <!-- Grid row-->
    <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

    <!-- Grid row-->
    <div class="row pb-3">

      <!-- Grid column -->
      <div class="col-md-12 text-center">

        <div class="mb-5 social flex-center">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f fa-lg white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter fa-lg white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g fa-lg white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in fa-lg white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram fa-lg white-text mr-4"> </i>
          </a>
          <!--Pinterest-->
          <a class="pin-ic">
            <i class="fab fa-pinterest fa-lg white-text"> </i>
          </a>

        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> Artisthub</a>
  </div>
  <!-- Copyright -->

</footer>