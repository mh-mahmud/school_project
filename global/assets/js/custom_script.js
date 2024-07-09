// JavaScript Document

$(document).ready(function () {
	 $(".dropdown").hover(
			function () {
				$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
					},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
						}
			);
});

$(function(){
    
    window.f = new flux.slider('#slider', {
        pagination: true
    });
});

//Fixed Menu
$("document").ready(function($){
    var nav = $('.menu-area');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 125) {
            nav.addClass("f-nav");
        } else {
            nav.removeClass("f-nav");
        }
    });
});

// Marquee
  $(function(){


  $('#marquee-vertical').marquee();  
  $('#marquee-horizontal').marquee({direction:'horizontal', delay:0, timing:10});  

});