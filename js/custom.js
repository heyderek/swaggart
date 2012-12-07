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
/*
  $('.menu ul li a').parent('li').has('.menu-overlay').click(function(){
    $('.featured-content .flexslider .flex-viewport').fadeTo(100, '.45');
    $(this).children('.menu-overlay').addClass('open');
    if($(this).children('.menu-overlay').hasClass('open')){
      $('.menu-overlay').slideUp().removeClass('open');
      $(this).children('.menu-overlay').slideDown();
    }else{
      $(this).children('.menu-overlay').removeClass('open').slideUp();
    }
  });  
*/
  
  $('.menu ul li > a').click(function(){
    if($(this).parent('li').has('.menu-overlay')){
      alert('I have a child!');
    }
    $('.featured-content .flexslider .flex-viewport').fadeTo(100, '.45');
    $(this).next();
    $('.close').click(function(){
      $('.featured-content .flexslider .flex-viewport').css('opacity', '1');
      $('.menu-overlay').slideUp();
    });
    if($(this).next()){
      $('.menu-overlay').slideUp();
      $(this).next().slideDown();
    }else{
      $(this).next().slideUp();
    }
  });
});
