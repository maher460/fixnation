<?php
$mapkey='AIzaSyCUp8A2-SN8eR-iYZPL5qlO47vzwk1xR3Q';
?>
<!doctype html>
<html>
<head>
  <meta name="viewport" content="initial-scale=1.0">
  <meta charset="utf-8">
  <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding-right: 5%;
      }
    </style>
  <title>Map test 2</title>
  <link rel="stylesheet" href="http://www.fixnation.co/styling/map/css/standardize.css">
  <link rel="stylesheet" href="http://www.fixnation.co/styling/map/css/index-grid.css">
  <link rel="stylesheet" href="http://www.fixnation.co/styling/map/css/index.css">
  <?php echo('<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key='.$mapkey.'"></script>'); ?>
  <script>
    var map;
    var markers = [];
    var markers2 = [];
    var infowindow = null;

    function initialize() {
      var mapOptions = {
        zoom: 14,
        disableDoubleClickZoom: true,
        mapTypeControl: false,
        streetViewControl: false,
        panControl: false,
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.LEFT_CENTER
          },
        scaleControl: false
      };
      map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);

      // Try HTML5 geolocation
      if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = new google.maps.LatLng(position.coords.latitude,
                                           position.coords.longitude);
    map.setCenter(pos);

    google.maps.event.addListener(map, 'dblclick', function(event) {
      //delete all markers set as current location
      for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
        markers = [];
      //infowindow is closed
      if (infowindow) {
        infowindow.close();
      }
      //new marker for current position is created
      var HereMarker = new google.maps.Marker({
          position: event.latLng,
          sName: "YOU ARE HERE",
          map: map,
          icon: {
              path: google.maps.SymbolPath.CIRCLE,
              scale: 10,
              fillColor: "#ff8a00",
              fillOpacity: 1,
              strokeWeight: 2,
              strokeColor: "#4f4f4f"
          },
      });
      //change center
      window.setTimeout(function() {
	      map.panTo(HereMarker.getPosition());
	    }, 300);
      //marker added to array
      markers.push(HereMarker);
      //infowindow created and opened
      infowindow = new google.maps.InfoWindow({
            map: map,
            position: event.latLng,
            content: 'YOU ARE HERE'
          });
      infowindow.open(map,HereMarker);
      //listener added
      google.maps.event.addListener(HereMarker, 'click', function() {
            infowindow = new google.maps.InfoWindow({
            map: map,
            position: event.latLng,
            content: 'YOU ARE HERE'
          });        
        });
    });

        var HereMarker = new google.maps.Marker({
          position: pos,
          sName: "YOU ARE HERE",
          map: map,
          icon: {
              path: google.maps.SymbolPath.CIRCLE,
              scale: 10,
              fillColor: "#ff8a00",
              fillOpacity: 0.7,
              strokeWeight: 2,
              strokeColor: "#4f4f4f"
          },
      });
      markers.push(HereMarker);
      var InfoWindow=null;
      //infowindow is closed
      if (infowindow) {
        infowindow.close();
      }
      //infowindow created and opened
      infowindow = new google.maps.InfoWindow({
            map: map,
            position: pos,
            content: 'YOU ARE HERE'
          });
      infowindow.open(map,HereMarker);
      //listener added
      google.maps.event.addListener(HereMarker, 'click', function() {
            infowindow = new google.maps.InfoWindow({
            map: map,
            position: pos,
            content: 'YOU ARE HERE'
          });        
        });
      //delete all markers set as current location
      for (var i = 0; i < markers2.length; i++) {
          markers2[i].setMap(null);
        }
        markers2 = [];      
      setMarkers(map, techguys1, 1);
      setMarkers(map, techguys2, 2);
      
      for (var i = 0; i < markers2.length; i++) {
        
      }

        }, function() {
          handleNoGeolocation(true);
        });
      } else {
        // Browser doesn't support Geolocation
        handleNoGeolocation(false);
      }

      var styles = [
      {
        stylers: [
          { hue: 5 },
          { saturation: 0 },
          { lightness: 30 }
        ]
      },{
        featureType: "road",
        elementType: "geometry",
        stylers: [
          { lightness: -20 },
          { visibility: "simplified" }
        ]
      },{
        featureType: "road",
        elementType: "labels",
        stylers: [
          { visibility: "on" }
        ]
      }
    ];

    map.setOptions({styles: styles});
    }

    var techguys1 = [
      ['abc1@gmail.com', 43.7032007,7.2734011, 1],
      ['abc2@gmail.com', 43.7132007,7.2834011, 2],
      ['abc5@gmail.com', 43.7322007,7.2834011, 3],
      ['abc5@gmail.com', 43.7232007,7.2834011, 4]
    ];
    var techguys2 = [
      ['abc4@gmail.com', 43.7132007,7.2634011, 5],
      ['abc5@gmail.com', 43.7332007,7.2734011, 6],
      ['abc3@gmail.com', 43.7232007,7.2934011, 7],
      ['abc3@gmail.com', 43.6232007,7.2934011, 8]
    ];

    function setMarkers(map, locations, xsize) {
      if (xsize==2) {
        var image = {
          url: 'http://www.fixnation.co/images/map/placemaker1.png',
          // This marker is 20 pixels wide by 30 pixels tall.
          size: new google.maps.Size(20, 30),
          // The origin for this image is 0,0.
          origin: new google.maps.Point(0,0),
          // The anchor for this image is the base of the flagpole at 0,32.
          anchor: new google.maps.Point(0, 30)
        };
      } else {
          //larger marker for IT guys
          var image = {
            url: 'http://www.fixnation.co/images/map/placemaker2.png',
            size: new google.maps.Size(30, 45),
            origin: new google.maps.Point(0,0),
            anchor: new google.maps.Point(0, 30)
          };
       
      }
      var shape = {
          coords: [1, 1, 1, 20, 18, 20, 18 , 1],
          type: 'poly'
      };
	  
      for (var i = 0; i < locations.length; i++) {
        var myLatLng = new google.maps.LatLng(locations[i][1], locations[i][2]);
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: image,
            shape: shape,
            title: locations[i][0],
            zIndex: locations[i][3],
            id: 'marker2'+locations[i][3]
        });
		markers2.push(marker);
        google.maps.event.addListener(marker, 'click', function() {
		    HighlightMarker(this.zIndex.toString(),'8');
		  });
        //listener added		
        
      }
    }


    function handleNoGeolocation(errorFlag) {
      if (errorFlag) {
        var content = 'Error: The Geolocation service failed.';
      } else {
        var content = 'Error: Your browser doesn\'t support geolocation.';
      }

      var options = {
        map: map,
        position: new google.maps.LatLng(60, 105),
        content: content
      };

      var infowindow = new google.maps.InfoWindow(options);
      map.setCenter(options.position);
    }

    google.maps.event.addDomListener(window, 'load', initialize);


    function placeMarker(location) {
      var marker = new google.maps.Marker({
          position: location, 
          map: map
      });
    }

    function scrollTo(target) {
	    var offset;
	    var scrollSpeed = 600;
	        var wheight = $(window).height();
	        //var targetname = target;
	        //var windowheight = $(window).height();
	        //var pagecenterH = windowheight/2;
	        //var targetheight = document.getElementById(targetname).offsetHeight;

	    if (viewport()["width"] > 767 && !jQuery.browser.mobile) {
	        // Offset anchor location and offset navigation bar if navigation is fixed
	        //offset = $(target).offset().top - document.getElementById('navigation').clientHeight;
	                offset = $(target).offset().top - $(window).height() / 2 + document.getElementById('navigation').clientHeight + document.getElementById('footer').clientHeight;
	    } else {
	        // Offset anchor location only since navigation bar is now static
	        offset = $(target).offset().top;
	    }

	    $('html, body').animate({scrollTop:offset}, scrollSpeed);
	}

    function HighlightMarker(id, maxcount){
      var str = null;
      for (i = 1; i <= maxcount; i++) { 
        str = 'expert'+i;
        document.getElementById(str).style.boxShadow = "0 0 0px";
        document.getElementById(str).style.height = "100px";
      }
      str = 'expert'+id;
      document.getElementById(str).style.boxShadow = "0 0 10px #ff8a00";
      document.getElementById(str).style.height = "300px";
      for (var i = 0; i < markers2.length; i++) {
      	if(markers2[i].zIndex.toString()==id){
      		//is selected
      		marker2[i].setIcon({
	          url: 'http://www.fixnation.co/images/map/placemaker1active.png',
	          size: new google.maps.Size(20, 30),
	          origin: new google.maps.Point(0,0),
	          anchor: new google.maps.Point(0, 30)
	          });
  			}
      	
          
        }
    }
  </script>
</head>
<body class="body page-index clearfix">
  <div class="header clearfix">
    <div class="body clearfix">
      <div class="mapcanvas" id="map-canvas"></div>
      <div class="sidebar clearfix" id="sidebar">
        <div class="expert" id="expert1" onclick="HighlightMarker('1','8')"></div>
        <div class="expert" id="expert2" onclick="HighlightMarker('2','8')"></div>
        <div class="expert" id="expert3" onclick="HighlightMarker('3','8')"></div>
        <div class="expert" id="expert4" onclick="HighlightMarker('4','8')"></div>
        <div class="expert" id="expert5" onclick="HighlightMarker('5','8')"></div>
        <div class="expert" id="expert6" onclick="HighlightMarker('6','8')"></div>
        <div class="expert" id="expert7" onclick="HighlightMarker('7','8')"></div>
        <div class="expert" id="expert8" onclick="HighlightMarker('8','8')"></div>
      </div>
    </div>
  </div>
</body>
</html>