$(document).ready(function(){
  //The main (front page) slideshow
  $('.caption').hide();
  $('.featured-content .flexslider').flexslider({
    animation: "slide",
    controlNav: false,
    start: function(animatingTo){
      $('.caption').fadeIn(1000);
    },
    after: function(animatingTo){
      $('.caption').fadeIn(1000);
    },
    before: function(animatingTo){
      $('.caption').hide();
    }
  });
  //Activate Flexslider for use in the footer to display recent posts.
  $('footer .flexslider').flexslider({
    animation: "slide",
    slideshowSpeed: 3000,
    animationSpeed: 300,
    controlNav: false
  });
  //Move the controls container within the dom (just for the footer slideshow).
  $('footer .flex-direction-nav').html(function(){
    $(this).appendTo('.footer-nav-container');
  });
  //Navigation
  $('.menu li > a').click(function(){
    var child = $(this).parent().find('.menu-overlay');

    if(child.length > 0){
      $('.featured-content .flexslider .flex-viewport').fadeTo(100, '.45');
    }
    $('.close').click(function(){
      $('.featured-content .flexslider .flex-viewport').css('opacity', '1');
      $('.menu-overlay').slideUp();
    });
    if($(this).next()){
      $('.menu-overlay').slideUp();
      $('.featured-content .flexslider .flex-viewport').css('opacity', '1');
      $(this).next().slideDown();
    }else{
      $(this).next().slideUp();
    }
  });
});
