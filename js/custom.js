$(document).ready(function(){
  $('.featured-content .flexslider').flexslider({
    animation: "slide",
    controlNav: false
  });
  $('footer .flexslider').flexslider({
    animation: "slide",
    animationLoop: false,
    controlNav: false
  });
  $('footer .flex-direction-nav').html(function(){
    $(this).appendTo('.footer-nav-container');
  });
});
