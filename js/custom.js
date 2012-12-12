$(document).ready(function(){
  //The main (front page) slideshow
  $('.caption').hide();
  $('.featured-content .flexslider').flexslider({
    animation: "slide",
    controlNav: false,
    start: function(animatingTo){
      $('.caption').fadeIn(300);
    },
    after: function(animatingTo){
      $('.caption').fadeIn(300);
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
    pauseOnHover: true,
    controlNav: false
  });
  //Move the controls container within the dom (just for the footer slideshow).
  $('footer .flex-direction-nav').html(function(){
    $(this).appendTo('.footer-nav-container');
  });
  
  var haveMenu = $('nav.menu ul li').find('.menu-overlay');
  if(haveMenu.length > 0){
    $('#menu-main-menu > li > a').attr('href', '#');
  }
  
  //Navigation
  $('.menu li > a').click(function(){
    var child = $(this).parent().find('.menu-overlay');
    var coverUp = $('.page-content, .featured-content').has('.cover');

    if(child.length > 0){
      /* $('<div class="cover"></div>').appendTo('.page-content, .featured-content'); */
      if(coverUp.length > 0){
      }else{
        $('<div class="cover"></div>').appendTo('.page-content, .featured-content');
      }
    }

/*
    $('.close').click(function(){
      $('.menu-overlay').slideUp(300);
      $('.cover').slideUp(300, function(){
        $(this).remove();
      })
    });
*/
    if($(this).next()){
      $('.menu-overlay').slideUp(300);
      $(this).next().slideDown(300);
    }else{
      $(this).next().slideUp(300);
    }
  });
});
