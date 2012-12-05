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
  $('.menu ul li a').click(function(){
    $('.featured-content .flexslider').css('opacity', '.5');
    $(this).next().addClass('open');
    $('.close').click(function(){
      $('.featured-content .flexslider').css('opacity', '1');
      $('div.menu-overlay').slideUp();
    });
    if($(this).next().hasClass('open')){
      $('div.menu-overlay').slideUp().removeClass('open');
      $(this).next().slideDown();
    }else{
      $(this).next().removeClass('open').slideUp();
    }
  });
});
