/* =================================
------------------------------------
	Unica - University Template
	Version: 1.0
 ------------------------------------ 
 ====================================*/



'use strict';


var window_w = $(window).innerWidth();

$(window).on('load', function() {
	/*------------------
		Preloder
	--------------------*/
	$(".loader").fadeOut(); 
	$("#preloder").delay(400).fadeOut("slow");

});

(function($) {

	/*------------------
		Navigation
	--------------------*/
	$('.nav-switch').on('click', function(event) {
		$('.main-menu').slideToggle(400);
		event.preventDefault();
	});


	/*------------------
		Background set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});

	
	/*------------------
		Hero Slider
	--------------------*/
	var window_h = $(window).innerHeight();
	var header_h = $('.header-section').innerHeight();
	var nav_h = $('.nav-section').innerHeight();

	if (window_w > 767) {
		$('.hs-item').height((window_h)-((header_h)+(nav_h)));
	}



	/*------------------
		Gallery
	--------------------*/
	$('.gallery').find('.gallery-item').each(function() {
		var pi_height1 = $(this).width(),
		pi_height2 = pi_height1/2;
		
		if($(this).hasClass('gi-long') && window_w > 991){
			$(this).css('height', pi_height2);
		}else{
			$(this).css('height', Math.abs(pi_height1));
		}
	});

	
	$(document).ready(function() {
		$('#example3').eagleGallery( {
			miniSliderArrowPos: 'inside', showMediumImg: false, openGalleryStyle: 'transform', bottomControlLine: true, allowUserZoom: false, autoPlayMediumImg: true, miniSlider: {
				itemsCustom: [ [0, 1], [350, 2], [750, 3], [1050, 5], [1250, 5], [1450, 6]]
			}
		}
		);
	}
	);
   
	$(function() {
		$('[data-toggle="datepicker"]').datepicker({
			autoHide: true,
			zIndex: 2048,
		});
	});
	var marker,i,locations=[['<b>Name 1</b><br>Address Line 1<br>7 Pier Parade, london E16 2LJ<br>Phone: 0207-0550-877<br><a href="#" >Link<a> of some sort.',51.4998247,.06334179999998923,1],['<b>Name 2</b><br>Address Line 1<br>7 Woodman Parade, London E16 2LL<br><a href="#" target="_blank">Link<a> of some sort.',51.5008811,.06366170000001148,2]],map=new google.maps.Map(document.getElementById("map"),{zoom:14,center:new google.maps.LatLng(51.5008811,.06366170000001148),mapTypeId:google.maps.MapTypeId.ROADMAP}),infowindow=new google.maps.InfoWindow;for(i=0;i<locations.length;i++)marker=new google.maps.Marker({position:new google.maps.LatLng(locations[i][1],locations[i][2]),map:map}),google.maps.event.addListener(marker,"click",function(o,e){return function(){infowindow.setContent(locations[e][0]),infowindow.open(map,o)}}(marker,i));
//	$(".dropdown-menu a.dropdown-toggle").on("click",function(o){return $(this).next().hasClass("show")||$(this).parents(".dropdown-menu").first().find(".show").removeClass("show"),$(this).next(".dropdown-menu").toggleClass("show"),$(this).parents("li.nav-item.dropdown.show").on("hidden.bs.dropdown",function(o){$(".dropdown-submenu .show").removeClass("show")}),!1});



})(jQuery);
