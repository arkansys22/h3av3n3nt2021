// Global Variabales
var $window = $(window);
var $windowHeight = $window.height();
var $windowWidth;
var $isServiceOpen = false;
var $serviceBackButton = $(".service-button-back");
var $noofServiceBox=6;
var $serviceSubpage=$('.service-subpage');
var $serviceBoxsection=$('.service-box-section');
var $serviceBox=$('.service-box');
var $serviceSubpageContent=$('.service-subpage-content');


$(document).ready(function() {
	$serviceSubpage.css("left", $(window).width()*2);
	$serviceSubpage.hide(1000);


//Service Back Button
$serviceBackButton.on("click",function () {
	toggleServiceBackButton();
	$isServiceOpen = false;
	$serviceBoxsection.show(800);	
	for(var i = $noofServiceBox; i > 0; i--) {
   		$(".service-box" + i).animate({left: 0}, {queue: false, duration:700, easing:"easeInOutQuart"});
  	}
  	$serviceSubpage.animate({left: $windowWidth}, {queue: false, duration:700, easing:"easeInOutQuart"});
	$serviceSubpage.hide(1000);	
}); 

});

$(window).resize(function() {
	positionElements();
	$windowWidth = $window.width();
});

// open Servicepage function
function openServicePage(index) {
		$isServiceOpen = true;
		toggleServiceBackButton();
		for(var i = $noofServiceBox; i > 0; i--) {
			$(".service-box" + i).animate({left: -$windowWidth}, {queue: false, duration:700, easing:"easeInOutQuart"});
		}
		$serviceBoxsection.hide(800);	
		$serviceSubpage.css("left", $windowWidth);
		$serviceSubpageContent.css("display", "none").hide();
		$serviceSubpage.show(1000);	
		$(".service-subpage" + index).show().css("display", "block");
		$serviceSubpage.animate({left: 0, right: 0}, {queue: false, duration:700, easing:"easeInOutQuart"});
}




//positionElements
function positionElements() {
	
	// Make sure that service subpage won't peak when scaling browser
	if($isServiceOpen == true) {
		$serviceBox.css("left", -$windowWidth + "px");
		$serviceSubpage.css("left", 0);
	} else {
		$serviceBox.css("left", "0px");
		$serviceSubpage.css("left", -$windowWidth + "px");
	}
}

//toggle Service Back Button
function toggleServiceBackButton() {
	if($serviceBackButton.css("marginLeft") == "-350px") {
		$serviceBackButton.stop().delay(1100).animate({marginLeft:0}, {queue: true, duration:300, easing:"easeOutQuad"});
	} else {
		$serviceBackButton.stop().animate({marginLeft:-350}, {queue: false, duration:300, easing:"easeOutQuad"});
	}
}
