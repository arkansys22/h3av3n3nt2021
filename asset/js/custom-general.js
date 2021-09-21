// To setup the template, change the variables below
// Follow instructions in code comments or see documentation for more detail

//  1. Configurations or Settings
//  2. Preloader
//  3. Navigation on click/ on load / on hash change scroll to 
// 	4. slicknav / Internal / Exteranl links 
//	5. General Sections
//	6. RSVP Form
//	7. Home page Promotions Sections
//	8. Portfolio on mouseover opactiy
//	9. Custom  Functions Section

// On Document Ready initialise the options 
jQuery(document).ready(function($){
"use strict";

/*****************************************************************************
			1. Configurations or Settings
******************************************************************************/

		//Scroll speed and page animation Scrollto.js parameter
		
		var horizontal_scroll_speed=parseInt("2000", 10); // speed Horizontal Scrollto parameter default #1200
		
		//content scrollbar (niceScroll) colour 
		var niceScrollcursorcolor = "#7A9B9E"// Set your content niceScroll color here!
		var niceScrollscrollspeed = parseInt("100", 10);  // Set niceScroll speed, default value is 60
	 	var niceScrollmousescrollstep = parseInt("80", 10);  // Set niceScroll speed with mouse wheel, default value is 40
		var	niceScrollcursorwidth =  "12px"	// Set cursor width in pixel, default is 5
		var	niceScrollcursorborderradius = "20px"  // Set niceScroll border radiuzxcs for cursor, default is "4px"
		var	niceScrollbackground = "#e9e9e9"  // Set your niceScroll rails background color
		var	niceScrollhidecursordelay = parseInt("200", 10); // Set your niceScroll rails background color
		
		
/********************** 1. Configuration / Settings END**********************/

/******************************************************************************
		  	2. Preloader
******************************************************************************/

//Preloader
		$("body").jpreLoader({
				splashID:"#jSplash",
				showPercentage:!0,
				autoClose:!0,
				showSplash: true,
				splashFunction:function(){
				$("#circle").delay(1250).animate({opacity:1},700,"linear");		
			 	 }
			   }, function() {
				  	homepageAnimation();
			 });
//Preloader end


/******************************************************************************
		  	3. Navigation on click/ on load / on hash change scroll to 
******************************************************************************/

//on page load show from hash index.html#about
/*********************************************************************************/
	//var url = window.location.href;
//	var type = url.split('#');
//	var hash = '';
//	if(type.length > 1) 
//	{ 
//	hash = type[1];
//	}
//	if (hash!=""){
//	var hash_fullname= "#" + hash;
//	$( "a[href='"+hash_fullname+"']" ).addClass('selected');
//		if(hash_fullname=="#home"){  //to init home resetting and hide submenu
//		homeAnimationResetting(); // resetting the homePage animation
//		$('#sub-menu').hide('fade', { direction: 'left', easing: 'easeInQuad' }, 1000);
//		Animation("#sub-menu","fadeOutUp","200");
//		}
//		else { //to init subpPage resetting and hide Mainmenu
//		$('#main-menu').hide('fade', { direction: 'left', easing: 'easeInQuad' }, 600);
//		//subpageAnimationHide();
//		subpageTopHeaderAnimation();
//		//subAnimation();
//		}
//		
//		$('#wrapper').scrollTo(hash_fullname, 2000, {easing:'easeInOutExpo', axis:'x', onAfter:function(){ // scrollto callback  function 
//			if(hash_fullname=="#home")
//				{ // for home page animation
//		//homepageAnimation();
//				}
//				else { // sub page animation
//			if(name!=""){			
//			if ( $('#sub-menu').is(':hidden')){ // checking the top sub header is showed
//			subpageTopHeaderAnimation();
//			} 
//			//subAnimation();
//			}
//			} // else close
//			} // scrollto callback function close
//			
//			});//	scrollto close
//	}// hash!="" close
//
//
//// on click navigation 
///*********************************************************************************/
//	$("#main-menu").on("click",function (e) { e.preventDefault(); });
//	$(".nav-link").on("click",function (e) { e.preventDefault(); });
//	
//
//	$('.main-nav a.nav-link,a.nav-link, .sub-nav a.nav-link ').on("click", function(){
//
//	var name = $(this).attr('href');
//	if(name!="#")  { // if navigation not equalt to "#"
//	
//	if(name=="#home"){
//	$('.selected').removeClass('selected');
//	$( "a[href='"+name+"']" ).addClass('selected');
//	homeAnimationResetting();
//	$('#sub-menu').hide('fade', { direction: 'left', easing: 'easeInQuad' }, 1000);
//	Animation("#sub-menu","fadeOutUp","200");
//	}
//	
//	else {
//	if(name!=""){
//	//	alert();
//	$('.selected').removeClass('selected');
//	$( "a[href='"+name+"']" ).addClass('selected');
//
//	//subpageAnimationHide();
//	//$('#main-menu').hide('fade', { direction: 'left', easing: 'easeInQuad' }, 600);
//		//Animation("#main-menu","fadeOutUp","200");
//	}}
//
////	scrollto start
//	$('#wrapper').scrollTo($(this).attr('href'), horizontal_scroll_speed, {easing:'easeInOutExpo', axis:'x', onAfter:function(){ // scrollto callback  function 
//
//	if(name=="#home"){ // for home page animation 
//	homepageAnimation();
//	$( "a[href='#home']" ).addClass('selected');
//	}
//	else { // sub page animation
//	if(name!=""){
//	if ( $('#sub-menu').is(':hidden')){ // checking the top sub header is showed
//	subpageTopHeaderAnimation();
//
//	} 
//	//subAnimation();
//
//	}
//	} // else close
//
//	} // scrollto callback function close
//	
//
//	});//	scrollto close
//	} // if navigation not equalt to "#" end
//	
//	}); // navigation click end


$(".navbar .dropdown").on({
    mouseenter: function () {
        $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
		$(this).toggleClass('open'); 
    },
    mouseleave: function () {
        	$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
		$(this).toggleClass('open'); 
    }
});


/* // Bootstrap DropDown Menu Hover */

/******************	3. Navigation on click/ on load / on hash change scroll to ******************/


/***************************************************
		  		4. slicknav / Internal / Exteranl links  
***************************************************/

// Slick navigation for mobile / tablet purpose

// For Home Page Navigation
$(function(){
	$('#home_scroll').slicknav({
	label: '',
	duration: 1000,
	easingOpen: "easeOutQuint", //available with jQuery UI
	closeOnClick:true,
	prependTo:"#menutop .container",

});
});

// For Sub Page Navigation
$(function(){
	$('#sub-nav').slicknav({
	label: '',
	duration: 1000,
	easingOpen: "easeOutQuint", //available with jQuery UI
	closeOnClick:true,
	prependTo:"#menutop .container",
	
});
});

// on hash change 
window.onhashchange = function() {
$('.selected').removeClass('selected');

var hash = window.location.hash;
if (hash!=""){
$( "a[href='"+hash+"']" ).addClass('selected');
}}

// on click navigation add class selected
$("#sub-menu ul.nav li a").on("click",function () {
	$('ul.nav li a').removeAttr('class');
	$(this).attr('class', 'nav-link selected ');
	});
// on external and internal page link 

// External Link use e-link
$('a.e-link').on("click",function () {
 return !window.open(this); 
 }); 

// Internal Link use i-link
$('a.i-link').on("click",function () {
var name = $(this).attr('href');
window.location.href = name;
}); 

/******************	4. slicknav / Internal / Exteranl links  ******************/



/*************************************************************
		  		4. General Sections
**************************************************************/

// niceScroll Bar options

		// niceScroll Bar options for Desktop version
		$(".contentscroll").niceScroll({
		cursorcolor:niceScrollcursorcolor,
		scrollspeed:niceScrollscrollspeed,
		mousescrollstep:niceScrollmousescrollstep,
		smoothscroll:true,
		cursorwidth:niceScrollcursorwidth,
		cursorborder:0, 
		cursordragontouch:true,
		cursorborderradius:niceScrollcursorborderradius,
		autohidemode:true,
		background: niceScrollbackground,
		hidecursordelay:niceScrollhidecursordelay,
		horizrailenabled:false
		});
		$(".contentscroll").mouseover(function() {
		$(".contentscroll").getNiceScroll().resize();
		});
		
		$(".contentscroll-mobile").niceScroll({
				cursorcolor:niceScrollcursorcolor,
		scrollspeed:niceScrollscrollspeed,
		mousescrollstep:niceScrollmousescrollstep,
		smoothscroll:true,
		cursorwidth:niceScrollcursorwidth,
		cursorborder:0, 
		cursordragontouch:true,
		cursorborderradius:niceScrollcursorborderradius,
		autohidemode:true,
		background: niceScrollbackground,
		hidecursordelay:niceScrollhidecursordelay,
		horizrailenabled:false
		});
		$(".contentscroll-mobile").mouseover(function() {
		$(".contentscroll-mobile").getNiceScroll().resize();
		});
// niceScroll Bar options end



// Home page Social on mouse over slide up / down
		jQuery(function($){
				$('.accura-jump a,' +
				'.accura-jump-bg a').each(function () {
					var $el = $(this);
					$el.append($el.find('i').clone());
				});
		$('.accura-social-icons-big a i').wrap('<span></span>');
		});

// Home page Social on mouse over END


// Place Holder for IE9
	$('input[type=text], textarea').placeholder();
// Place Holder for IE9

/****************** 4. General Sections END******************/

/*************************************************************
            5. Contact Form Start
**************************************************************/	
	  $('#contact_form').validate(
		{
		rules: {
		name: {
		minlength: 2,
		required: true
		},
		phone: {
		required: true,
		},
		email: {
		required: true,
		email: true
		},
		message: {
		minlength: 2,
		required: true
		}
		},
		
		messages: {
            name: "Please enter your name",
            email: "Please enter a valid email address",
			phone: "Please enter your phone number",
        },
		
		highlight: function(element) {
		$(element).closest('.control-group').removeClass('success').addClass('error');
		},
		success: function(element) {
		element
		.text('OK!').addClass('valid')
		.closest('.control-group').removeClass('error').addClass('success');
		},
		submitHandler: function(form) {
						// do other stuff for a valid form
						$.post('contact-general-form.html', $("#contact_form").serialize(), function(data) { // action file is here 
							$('#contact_form').html(data);
						});
					}
		});
	  
/****************** estimation form ******************/	  
	  
	   $('#estimation_form').validate(
		{
		rules: {
		name: {
		minlength: 2,
		required: true
		},
		phone: {
		required: true,
		},
		email: {
		required: true,
		email: true
		},
		message: {
		minlength: 2,
		required: true
		}
		},
		
		messages: {
            name: "Please enter your name",
            email: "Please enter a valid email address",
			phone: "Please enter your phone number",
        },
		
		highlight: function(element) {
		$(element).closest('.control-group').removeClass('success').addClass('error');
		},
		success: function(element) {
		element
		.text('OK!').addClass('valid')
		.closest('.control-group').removeClass('error').addClass('success');
		},
		submitHandler: function(form) {
						// do other stuff for a valid form
						$.post('estimation-general-form.html', $("#estimation_form").serialize(), function(data) { // action file is here 
							$('#estimation_form').html(data);
						});
					}
		});
	   
/****************** 5. Contact Form END******************/



/*************************************************************
		  	 7. Portfolio on mouseover opactiy
*************************************************************/

// Isotope 
$(function(){
      
var $container = $('#filter-01');
$container.isotope({
itemSelector : '.element'
});

var $optionSets = $('#options .option-set'),
$optionLinks = $optionSets.find('a');
$optionLinks.on('click', function(){
var $this = $(this);
// don't proceed if already selected
if ( $this.hasClass('selected') ) {
  return false;
}
var $optionSet = $this.parents('.option-set');
$optionSet.find('.selected').removeClass('selected');
$this.addClass('selected');

// make option object dynamically, i.e. { filter: '.my-filter-class' }
var options = {},
	key = $optionSet.attr('data-option-key'),
	value = $this.attr('data-option-value');
// parse 'false' as false boolean
value = value === 'false' ? false : value;
options[ key ] = value;
if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
  // changes in layout modes need extra logic
  changeLayoutMode( $this, options )
} else {
  // otherwise, apply new options
  $container.isotope( options );
}

return false;
});
});
// Isotope 
//mixitup Portfolio END


/****************** 7. Portfolio on mouseover opactiy END******************/

// delegate calls to data-toggle="lightbox"
		$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
		event.preventDefault();
		return $(this).ekkoLightbox({
		always_show_close: true
		});
		});
// Light Box

// .modal-backdrop classes
$(".modal-fullwhite").on('show.bs.modal', function () {
  setTimeout( function() {
    $(".modal-backdrop").addClass("modal-fullwhite-backdrop");
  }, 0);
});

$(".modal-fullwhite").on('hidden.bs.modal', function () {
  $(".modal-backdrop").addClass("modal-fullwhite-backdrop");
});


// appear Elements animation
	$('.element-from-top').each(function () {
		$(this).appear(function() {
		  $(this).delay(150).animate({opacity:1,top:"0px"},1000);
		});	
	});

	$('.element-from-bottom').each(function () {
		$(this).appear(function() {
		  $(this).delay(150).animate({opacity:1,bottom:"0px"},1000);
		});	
	});
	
	$('.element-from-left').each(function () {
		$(this).appear(function() {
		  $(this).delay(150).animate({opacity:1,left:"0px"},1000);
		});	
	});
	
	$('.element-from-right').each(function () {
		$(this).appear(function() {
		  $(this).delay(150).animate({opacity:1,right:"0px"},1000);
		});	
	});
	
	$('.element-from-in').each(function () {
		$(this).appear(function() {
		  $(this).delay(150).animate({opacity:1,right:"0px"},1000);
		});	
	});
// appear Elements animation end


// News Section
$('.news-section').on('click', function(e) {
    e.preventDefault(); //prevent the link from being followed
    $('.news-section').removeClass('active');
    $(this).addClass('active');
});

/*   Spmenu video Stop On Click Close Button  */
var video_containers;
$('button.close').on("click", function() {
   video_containers = $('.embed-responsive');
   video_containers.html( video_containers.html() );
});

$('.modal').on("click", function() {
   video_containers = $('.embed-responsive');
   video_containers.html( video_containers.html() );
});

/*   Spmenu video Stop On Click Close Button  */

}); 
// On Document Ready initialise the options 




/*************************************************************
		    9. Custom  Functions Section
*************************************************************/

/*************************************************************
		    8. Custom  Animation  Section
*************************************************************/


// this is used to add Class and webkit animation 
	function Animation(element,effect) 
	{
	$(element).removeClass().addClass(effect + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
	$(this).removeClass();
	});
	};

// home page animation functions
	function homepageAnimation()
	{
	$('#main-menu').show('fade', { easing: 'easeInQuad' }, 600); //on homepage Main menu  sliding up animation 
	Animation("#main-menu","fadeInUp","1000"); //on homepage Main menu sliding up animation 
	homeAnimation(); // Home Animation starts here.
	}


// sub page animation functions
	function subpageTopHeaderAnimation ()
	{
	Animation("#sub-menu","fadeInDown","200");
	$('#sub-menu').show('fade', { direction: 'top', easing: 'easeInQuad' }, 300); //on sub page topbar sliding down animation 
	}




function homeAnimation()
	{
		
	$('#main-menu .navbar').transition({
		 opacity:1,y:0,delay:1400
		},900,"snap");
		
		
		$(".accura-social-icons #1").transition({
		x:-20,opacity:0,delay:0
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".accura-social-icons #2").transition({
		x:-20,opacity:0,delay:200
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".accura-social-icons #3").transition({
		x:-20,opacity:0,delay:400
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".accura-social-icons #4").transition({
		x:-20,opacity:0,delay:600
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".accura-social-icons #5").transition({
		x:-20,opacity:0,delay:800
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".home_address").transition({
		x:-20,opacity:0,delay:1100
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".call").transition({
		x:-20,opacity:0,delay:1300
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".typer").transition({
		x:-20,opacity:0,delay:1500
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".vegas-fullwidth").transition({
		x:0,opacity:0,delay:1500
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".content-block .slider").transition({
		x:0,opacity:0,delay:1500
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".color-bg").transition({
		x:-20,opacity:0,delay:1500
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".home-cycle-slider .cycle-caption").transition({
		x:-20,opacity:0,delay:1500
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
	
		
		$(".spmenu-tags1 .spmenu").transition({
		x:70,opacity:0,delay:2000
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".spmenu-tags2 .spmenu").transition({
		x:70,opacity:0,delay:2200
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".spmenu-tags3 .spmenu").transition({
		x:70,opacity:0,delay:2400
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		
		$(".spmenu-tags4").transition({
		x:70,opacity:0,delay:2600
		},200,"snap").transition({x:0, opacity:1},600,"ease",function(){

		});
		}
	
	function homeAnimationResetting()
	{
	$("#main-menu .navbar, .accura-social-icons #1, .accura-social-icons #2, .accura-social-icons #3, .accura-social-icons #4, .accura-social-icons #5,.home_address, .call, .typer, .vegas-fullwidth, .content-block .slider, .color-bg, .home-cycle-slider .cycle-caption, .spmenu-tags1 .spmenu1, .spmenu-tags2 .spmenu, .spmenu-tags3 .spmenu, .spmenu-tags4 .spmenu").css("transform","");
	$("#main-menu .navbar, .accura-social-icons #1, .accura-social-icons #2, .accura-social-icons #3, .accura-social-icons #4, .accura-social-icons #5,.home_address, .call, .typer, .vegas-fullwidth, .content-block .slider, .color-bg, .home-cycle-slider .cycle-caption, .spmenu-tags1 .spmenu1, .spmenu-tags2 .spmenu, .spmenu-tags3 .spmenu, .spmenu-tags4 .spmenu").css("opacity","0");
	$("#main-menu .navbar, .accura-social-icons #1, .accura-social-icons #2, .accura-social-icons #3, .accura-social-icons #4, .accura-social-icons #5,.home_address, .call, .typer, .vegas-fullwidth, .content-block .slider, .color-bg, .home-cycle-slider .cycle-caption, .spmenu-tags1 .spmenu1, .spmenu-tags2 .spmenu, .spmenu-tags3 .spmenu, .spmenu-tags4 .spmenu").css("transition","");
	}
	


// resize panel function
	//$(window).resize(function () {
//			resizePanel();
//		});
//	
//	function resizePanel() {
//		width = $(window).width();
//		height = $(window).height();
//	
//		mask_width = width * $('.wrapper-section').length;
//			
//		$('#debug').html(width  + ' ' + height + ' ' + mask_width);
//			
//		$('#wrapper, .wrapper-section').css({width: width, height: height});
//		$('#mask').css({width: mask_width, height: height});
//		$('#wrapper').scrollTo($('a.selected').attr('href'), 0);
//			
//	}
//	$(window).load(function() {    
//		var theWindow        = $(window),
//			$bg              = $(".bg"),
//			aspectRatio      = $bg.width() / $bg.height();
//	
//		function resizeBg() {
//	
//			if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
//				$bg
//					.removeClass()
//					.addClass('bgheight');
//			} else {
//				$bg
//					.removeClass()
//					.addClass('bgwidth');
//			}
//		}
//		theWindow.resize(function() {
//			resizeBg();
//		}).trigger("resize");
//	
//	});
//	
//	$(window).trigger('resize');



/******************  9. Custom  Functions Section END******************/
