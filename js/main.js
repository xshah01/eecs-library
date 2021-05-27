
/* Isotope filter */
$(window).load(function(){

    var bookIsotope = $('.book-container').isotope({
      itemSelector: '.book-thumbnail',
      layoutMode: 'fitRows'
      });
  
    $('#book-filters li').on( 'click', function() {
    $("#book-filters li").removeClass('filter-active');
    $(this).addClass('filter-active');
  
      bookIsotope.isotope({ filter: $(this).data('filter') });
    });
  
  })

/* Fixed Navbar */
window.addEventListener("scroll", function () {
  var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
  })

/* Hide navbar when scrolling down. Else, show the navbar. */
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.querySelector("header").style.top = "0";
  } else {
    document.querySelector("header").style.top = "-150px";
  }
  prevScrollpos = currentScrollPos;
}

  /* Scroll to Top */
const toTop = document.querySelector(".to-top");
window.addEventListener("scroll", () => {
  if (window.pageYOffset > 1000) {
    toTop.classList.add("active");
  } else {
    toTop.classList.remove("active");
  }

})

/* Scroll to Top - används? */
$(function() {
    $('a[href*=#]').on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 50, 'linear');
    });
  });