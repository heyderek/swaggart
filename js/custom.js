$(document).ready(function(){
  $('.flexslider').flexslider({
    animation: "slide",
    animationLoop: false,
    controlNav: false
  });
  $('.flex-direction-nav').html(function(){
    $(this).appendTo('.footer-nav-container');
  });
});
