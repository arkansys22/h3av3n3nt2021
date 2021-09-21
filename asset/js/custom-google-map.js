// On Document Ready initialise the options
jQuery(document).ready(function($){
"use strict";


// ******************************************************************************************
// Configuration Start
// ******************************************************************************************

//*********************Google MAP *********************/

		var color = "#333" // google map background colour
		var saturation = 0 //
		var mapLatitude=-6.333899
		var mapLongitude=106.920375//(Fist Value Latitude, Second Value ), get YOUR coordenates here!: http://itouchmap.com/latlong.html
		var mapZoom_value=16 // Map zoom level parameter only numeric


// Google map marker example 2 locations
		//map-marker #1
		var marker1_Latitude=40.707892
		var marker1_Longitude=-74.008920
		var marker1_content="<h3>Princeton</h3><p>#123, 6th Avenue cross street, <br/> Clover bridge road, Princeton, NJ 08403</p> " // marker or  on click content (Info Window)
		var marker1_pointerUrl = 'assets/img/map-marker-01.png' // set your color pointer here!

		//map-marker #2
		var marker2_Latitude=40.710892
		var marker2_Longitude=-74.012920
		var marker2_content="<h3>Trenton</h3> <p>New Royal Park #162, 4th street, <br/> Royal Avenue, Trenton, NJ 36310</p>" // marker or  on click content (Info Window)
		var marker2_pointerUrl = 'assets/img/map-marker-01.png' // set your color pointer here!

//********************* Google MAP END *********************/



//****************************************************************************
		  		// Google map
//****************************************************************************
			//dragable mobile
			var drag;
			if($(window).width()<796){drag=false;}else{drag=true;}

		/* googleMaps */

				function map_canvas_loaded() {
				var latlng = new google.maps.LatLng(mapLatitude,mapLongitude);

				// setting styles here
				var styles =

				[{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},{"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}]

				var options = {
				 center : latlng,
				 mapTypeId: google.maps.MapTypeId.ROADMAP,
				 zoom : mapZoom_value,
				 styles: styles,
scrollwheel:  false
				};
				var map_canvas = new google.maps.Map(document.getElementById('map_canvas'), options);




				//****************************************************************************
		  		// marker 1 content
				//****************************************************************************
				var pointer1 = new google.maps.LatLng(marker1_Latitude,marker1_Longitude);

				var marker1= new google.maps.Marker({
				 position : pointer1,
				 map : map_canvas,
				 icon: marker1_pointerUrl //Custom Pointer URL
				 });

				google.maps.event.addListener(marker1,'click',
				 function() {
				 var infowindow = new google.maps.InfoWindow(
				 {content:marker1_content });
				 infowindow.open(map_canvas,marker1);
				 });
				// marker 1 END



				//****************************************************************************
		  		// marker 2 content
				//****************************************************************************
				var pointer2 = new google.maps.LatLng(marker2_Latitude,marker2_Longitude);

				var marker2= new google.maps.Marker({
				 position : pointer2,
				 map : map_canvas,
				 icon: marker2_pointerUrl //Custom Pointer URL
				 });

				google.maps.event.addListener(marker2,'click',
				 function() {
				 var infowindow = new google.maps.InfoWindow(
				 {content:marker2_content });
				 infowindow.open(map_canvas,marker2);
				 });
				// marker 2 END

			}

				window.onload = function() {
				 map_canvas_loaded();
				};
			/* End */


//Google map end

});
// On Document Ready initialise the options
