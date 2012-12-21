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
  $('footer .flex-direction-nav').html(function(index){
    $(this).appendTo('.footer-nav-container');
  });
  
  jQuery.fn.log = function (msg) {
      console.log("%s: %o", msg, this);
      return this;
  };
  
  //Swap Nav items to hashes for dropdown-overlay functionality.
  var haveMenu = $('#menu-main-menu > li').find(' .menu-overlay');
  var addButton = $('nav.menu ul li').find('.menu-overlay');
  
  if(haveMenu.length > 0){
    haveMenu.parent().find('> a').attr('href','#');
  }
  
  $('#menu-main-menu > li').each(function(){
    $(this).find('img').html(function(){
      $(this).prependTo($(this).next());
    });
  });
  
  var anchors = $('#menu-main-menu > li > a');
  
  $.each(anchors, function(){ 
    var sibling = $(this).next(), 
        text = $(this).text();
    /* text.log(); */
    $(this).clone().prependTo(sibling).wrap('<h4 />');  
  });
  
  
  
  
  
  
  
  //Add the close button to applicable menus.
  $('<button class="button close">Close</button>').appendTo(addButton);
  
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

    $('.close').click(function(){
      $('.menu-overlay').slideUp(300);
      $('.cover').slideUp(300, function(){
        $(this).remove();
      })
    });
    if($(this).next()){
      $('.menu-overlay').slideUp(300);
      $(this).next().slideDown(300);
    }else{
      $(this).next().slideUp(300);
    }
  });
});
