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
  
  //Grab the navigation, and create an options menu for mobile dropdown.
  $(function() {
    //Append the select element to the navigation
    $("<select />").appendTo("nav");
    $("<option />", {
       "selected": "selected",
       "value"   : "",
       "text"    : "Go to..."
    }).appendTo("nav select");
    //Find the links within the nav, and convert them to options
    $(".menu a").each(function() {
     var navLink = $(this);
    //Grab the values and attribute them to the proper option element
    $("<option />", {
         "value" : navLink.attr("href"),
         "text" : navLink.text()
     }).appendTo("nav select");
    });
    $("nav select").change(function() {
      window.location = $(this).find("option:selected").val();
    });
  });
  
  
  
  //Building the Nav Menu
  var haveChild = $('#menu-main-menu > li').has('ul');
  
  if( haveChild.length > 0){
    haveChild.each(function(){
      $(this).children('ul').wrap('<div class="menu-overlay" />');
      $(this).children('a').attr('href','#');
    });
  }
  
  var haveMenu = $('#menu-main-menu > li').find(' .menu-overlay'),
      addButton = $('nav.menu ul li').find('.menu-overlay');

  $('#menu-main-menu > li').each(function(){
    $(this).find('img').html(function(){
      $(this).prependTo($(this).next());
    });
  });
  

  
  var flexWidth = $('footer .flexslider li > h4').width();


  
  
  
  
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
