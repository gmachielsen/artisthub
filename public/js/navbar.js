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
};

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }