$(document).ready(function(){
  //The main (front page) slideshow
  $('.featured-content .flexslider').flexslider({
    animation: "slide",
    controlNav: false
  });
  //Activate Flexslider for use in the footer to display recent posts.
  $('footer .flexslider').flexslider({
    animation: "slide",
    animationLoop: false,
    slideshowSpeed: 3000,
    animationSpeed: 300,
    controlNav: false
  });
  //Move the controls container within the dom.
  $('footer .flex-direction-nav').html(function(){
    $(this).appendTo('.footer-nav-container');
  });
});
