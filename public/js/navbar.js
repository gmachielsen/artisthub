// $(document).scroll(function() {
//     var isScrolled = $(this).scrollTop() > $(".topBar").height();
//     $(".topBar").toggleClass("scrolled", isScrolled);
// })


const header = document.getElementById("header");

document.getElementsByTagName('body')[0].onscroll = () => {
  header.classList.add("visible");

  if(window.scrollY === 0) {
    header.classList.remove("visible");
  } 

  if(window.matchMedia("(max-width: 1000px)")) {
    document.querySelector("#menu-items").style.display = "none!important";
  }

  if(window.scrollY > 0) {
    document.querySelector("#menu-items").style.display = "none";
    document.querySelector('#header').style.paddingTop = "10px";
    document.querySelector('#header').style.paddingBottom = "10px";


  } else {

    document.querySelector("#menu-items").style.display = "block";
    document.querySelector('#header').style.paddingTop = "20px";
    document.querySelector('#header').style.paddingBottom = "20px";
  }


};

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }



  var i = 0;
  var images = [];
  var time = 5000;

  // images[0] = { 'data-src':"{{ asset('cover/deanna-j-3GZlhROZIQg-unsplash.jpg')}}"};
  // images[1] = url("{{ asset('cover/kevin-laminto-iRZQjV--Z_4-unsplash.jpg')}}");
  // images[2] = asset('cover/pexels-andrew-neel-2123337.jpg');
  // images[3] = "{{ asset('cover/pexels-leah-kelley-952588.jpg')}}";
  // images[4] = "{{ asset('cover/pexels-pixabay-460736.jpg')}}";
  // images[5] = "{{ asset('cover/pexels-tiff-ng-2711718.jpg')}}";

  images[0] = 'cover/deanna-j-3GZlhROZIQg-unsplash.jpg';
  images[1] = 'cover/kevin-laminto-iRZQjV--Z_4-unsplash.jpg';
  images[2] = 'cover/pexels-andrew-neel-2123337.jpg';
  images[3] = 'cover/pexels-leah-kelley-952588.jpg';
  images[4] = 'cover/pexels-pixabay-460736.jpg';
  images[5] = 'cover/pexels-tiff-ng-2711718.jpg';


  // images[0] = "http://127.0.0.1:8000/cover/deanna-j-3GZlhROZIQg-unsplash.jpg";
  // images[1] = 'http://127.0.0.1:8000/cover/kevin-laminto-iRZQjV--Z_4-unsplash.jpg';
  // images[2] = 'http://127.0.0.1:8000/cover/pexels-andrew-neel-2123337.jpg';
  // images[3] = 'http://127.0.0.1:8000/cover/pexels-leah-kelley-952588.jpg';
  // images[4] = 'http://127.0.0.1:8000/cover/pexels-pixabay-460736.jpg';
  // images[5] = 'http://127.0.0.1:8000/cover/pexels-tiff-ng-2711718.jpg';


function changeImg() {
  document.slide.src = images[i];

  if(i < images.length - 1) {
    i++;
  } else {
    i = 0;
  }

  setTimeout("changeImg()", time);
}

window.onload = changeImg;



w3.slideshow(".nature", 1000);
