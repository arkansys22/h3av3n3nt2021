// On Document Ready initialise the options 
jQuery(document).ready(function($){
"use strict";

// Center Item
$('#owl-demo').owlCarousel({
    items:2,
	itemsDesktop      : [2400,3],
    itemsDesktopSmall     : [1440,2],
    itemsTablet       : [991,2],
    itemsMobile       : [768,1],
	navigation :false,
	pagination :false,
	slideSpeed : 1000,
	navigationText : ["",""]
});

// project photos
$('.project-photos').owlCarousel({
	singleItem : true,
    navigation :true,
	pagination :true,
	slideSpeed : 1000,
	navigationText : ["",""]
});


$('.three-item').owlCarousel({
	items : 3,
	itemsDesktop      : [1199,3],
    itemsDesktopSmall     : [979,3],
    itemsTablet       : [768,1],
    itemsMobile       : [479,1],
    navigation :true,
	pagination :false,
	slideSpeed : 1000,
	navigationText : ["",""]
});

$('.four-slide').owlCarousel({
	items : 5,
	itemsDesktop      : [1199,5],
    itemsDesktopSmall     : [979,4],
    itemsTablet       : [768,2],
	itemsMobile       : [479,1],
    navigation :true,
	pagination :true,
	slideSpeed : 1000,
	navigationText : ["",""]
});


// Thumbnail OWL Slider
 
  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
 
  sync1.owlCarousel({
    singleItem : true,
    slideSpeed : 1000,
    navigation: true,
    pagination:false,
    afterAction : syncPosition,
    responsiveRefreshRate : 200,
	navigationText : ["",""]
  });
 
  sync2.owlCarousel({
    items : 4,
    itemsDesktop      : [1199,4],
    itemsDesktopSmall     : [979,4],
    itemsTablet       : [768,2],
    itemsMobile       : [479,2],
    pagination:false,
    responsiveRefreshRate : 100,
    afterInit : function(el){
      el.find(".owl-item").eq(0).addClass("synced");
    }
  });
 
  function syncPosition(el){
    var current = this.currentItem;
    $("#sync2")
      .find(".owl-item")
      .removeClass("synced")
      .eq(current)
      .addClass("synced")
    if($("#sync2").data("owlCarousel") !== undefined){
      center(current)
    }
  }
 
  $("#sync2").on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).data("owlItem");
    sync1.trigger("owl.goTo",number);
  });
 
  function center(number){
    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
    var num = number;
    var found = false;
    for(var i in sync2visible){
      if(num === sync2visible[i]){
        var found = true;
      }
    }
 
    if(found===false){
      if(num>sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", num - sync2visible.length+2)
      }else{
        if(num - 1 === -1){
          num = 0;
        }
        sync2.trigger("owl.goTo", num);
      }
    } else if(num === sync2visible[sync2visible.length-1]){
      sync2.trigger("owl.goTo", sync2visible[1])
    } else if(num === sync2visible[0]){
      sync2.trigger("owl.goTo", num-1)
    }
    
  }
 
});
// On Document Ready initialise the options