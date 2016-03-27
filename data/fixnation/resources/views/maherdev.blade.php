<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Find tech savvy people in your area to fix your IT issues">
<meta name="keywords" content="fix,repair,broken,computer,windows,smartphone,android,wifi,printer,technician,doha,quatar">
<meta name="author" content="Fixnation">
<meta name="robots" content="noindex, follow">
<meta property="og:locale" content="en_US" />
<meta property="og:title" content="Fixnation = Tech help around the corner" />
<meta property="og:description" content="Find tech savvy people in your area to fix your IT issues" />
<meta property="og:image" content="http://www.fixnation.co/img/facebookog.jpg" />
<meta property="og:url" content="http://www.fixnation.co/" />
    <title>Fixnation | Help Nearby</title>
    <link rel="stylesheet" href="{{ URL::asset('css/foundation.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/map_page_style2.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('foundation-icons/foundation-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('foundation-icons/foundation-icons.css') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="http://www.fixnation.co/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="http://www.fixnation.co/icons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="http://www.fixnation.co/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="http://www.fixnation.co/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="http://www.fixnation.co/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="http://www.fixnation.co/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="http://www.fixnation.co/icons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="http://www.fixnation.co/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="http://www.fixnation.co/icons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="http://www.fixnation.co/icons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="http://www.fixnation.co/icons/favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="http://www.fixnation.co/icons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="http://www.fixnation.co/icons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="http://www.fixnation.co/icons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="http://www.fixnation.co/icons/manifest.json">
    <link rel="shortcut icon" href="http://www.fixnation.co/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Fixnation">
    <meta name="application-name" content="Fixnation">
    <meta name="msapplication-TileColor" content="#4f4f4f">
    <meta name="msapplication-TileImage" content="http://www.fixnation.co/icons/mstile-144x144.png">
    <meta name="msapplication-config" content="http://www.fixnation.co/icons/browserconfig.xml">
    <meta name="theme-color" content="#4f4f4f">
    
    <style>
      #map-canvas {
        width: 800px;
        height: 800px;
      }
      
    </style>
    <script src="{{ URL::asset('js/vendor/modernizr.js') }}"></script>
    <script src="{{ URL::asset('js/vendor/jquery.js') }}"></script>
    <script>
    
        
        var x = document.getElementById("demo");
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude + 
            "<br>Longitude: " + position.coords.longitude; 
        }
</script>

    


<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCUp8A2-SN8eR-iYZPL5qlO47vzwk1xR3Q"></script>
<?

$currentUser = Auth::user();
$users = $usersData['users'];
$sizeOfUsers = sizeof($users);
 $usersArray = array();

  if(isset($users)){
      foreach($users as $user){
          $usersArray[] = array($user->firstname.' '.$user->lastname,$user->latitude,$user->longitude, $user->id, $user->count);
      }
  }
  

  
?>

<script>
    var map;
    var markers = [];
    var markers2 = [];
    var infowindow = null;
    var users = <?php echo json_encode($usersArray)?>;
    
    
    function initialize() {
    
      //todophp to number 4
     for (var i = 0; i < users.length; i++) {

        str = 'expert'+users[i][3];
        strext = 'expertext'+users[i][3];
        
        if(document.getElementById(str)){
            document.getElementById(str).style.height = "auto";
            var vext = document.getElementsByName(strext);
            var a;
          for (a = 0; a < vext.length; a++) {
              vext[a].style.visibility="hidden";
              vext[a].style.height="0px";
          }
        }
        
      };
      var mapOptions = {
        zoom: 13,
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
      //delete all markers of tech guys
      for (var i = 0; i < markers2.length; i++) {
          markers2[i].setMap(null);
        }
        markers2 = [];      
      setMarkers(map, techguys, 1, 0);
     // setMarkers(map, techguys2, 2, 0);
      

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

    /*map.setOptions({styles: styles});*/
    }

    //todophp bigger markers
    var techguys = <?php echo json_encode($usersArray)?>;
    
   

    function setMarkers(map, locations, xsize, selid) {
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
        var imageactive = {
          url: 'http://www.fixnation.co/images/map/placemaker1active.png',
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
          var imageactive = {
            url: 'http://www.fixnation.co/images/map/placemaker2active.png',
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
        if (locations[i][3]==selid){
          var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              icon: imageactive,
              shape: shape,
              title: locations[i][0],
              zIndex: locations[i][3],
              id: 'marker2'+locations[i][3]
          });
        }
        else {
          var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              icon: image,
              shape: shape,
              title: locations[i][0],
              zIndex: locations[i][3],
              id: 'marker2'+locations[i][3]
          });
        }        
    markers2.push(marker);
        google.maps.event.addListener(marker, 'click', function() {
        //todophp number 4      
        HighlightMarker(this.zIndex.toString(),<?=$sizeOfUsers?>);
      });
        //listener added    
        
      }
    }


    function handleNoGeolocation(errorFlag) {
      if (errorFlag) {
        var content = 'We could not get your location. Please double click on the place with your real location.';
      } else {
        var content = 'We could not get your location. Please double click on the place with your real location.';
      }

      var pos=new google.maps.LatLng(25.3013376,51.4312169)

      var options = {
        map: map,
        position: pos,
        content: content
      };

      var infowindow = new google.maps.InfoWindow(options);
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
            content: 'We could not get your location. Please double click on the place with your real location.'
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
      //delete all markers of tech guys
      for (var i = 0; i < markers2.length; i++) {
          markers2[i].setMap(null);
        }
        markers2 = [];      
      setMarkers(map, techguys, 1, 0);
     // setMarkers(map, techguys2, 2, 0);

    }

    google.maps.event.addDomListener(window, 'load', initialize);


    function placeMarker(location) {
      var marker = new google.maps.Marker({
          position: location, 
          map: map
      });
    }

    function HighlightMarker(id){
        
        
      var str = null;
    
      for (i = 0; i <= users.length-1; i++) { 
      
        str = 'expert'+users[i][3];
        strext = 'expertext'+users[i][3];
        console.log(str);
        document.getElementById(str).style.boxShadow = "0 0 0px";
        document.getElementById(str).style.height = "auto";
        var vext = document.getElementsByName(strext);
        var a;
          for (a = 0; a < vext.length; a++) {
              vext[a].style.visibility="hidden";
              vext[a].style.height="0px";
          }
      }
      str = 'expert'+id;
      strext = 'expertext'+id;
      if ((id!=0)&&(id!=0)){
          //open details
          document.getElementById(str).style.boxShadow = "0 0 10px #ff8a00";
          var elmnt = document.getElementById("sidebar");
          document.getElementById(str).style.height = "auto";
          //document.getElementById(str).style.height = (elmnt.clientHeight-10).toString()+"px";
          document.getElementById(str).scrollIntoView();
          //window.scrollBy(0, -20);
          var vext = document.getElementsByName(strext);
            var a;
              for (a = 0; a < vext.length; a++) {
                  vext[a].style.visibility="visible";
                  vext[a].style.height="auto";
              }
          var selected=0;
          var selectedmark = new google.maps.Marker();
          for (var i = 0; i < markers2.length; i++) {
            if(markers2[i].zIndex.toString()==id){
              selected=markers2[i].zIndex;
              //map.setCenter(marker2[i].getPosition());
              //selectedmark=markers2[i];
            }
          //change center
          //todo
          /*window.setTimeout(function() {
            map.panTo(markers2[i].getPosition());
          }, 300);*/
            //map.panTo(selectedmark.getPosition());            
        }
      }
      else {
        //close details
        event.stopPropagation();        
      }
      //delete all markers of tech guys
      for (var i = 0; i < markers2.length; i++) {
          markers2[i].setMap(null);
        }
        markers2 = [];      
      setMarkers(map, techguys, 1, selected);
      
    }

    $( document ).ready(function() {
        // $("#map-canvas").width((($(window).width() * 1.9) / 3));
        // $("#map-canvas").height((($(window).height() * 2.9) / 3));

        // $( window ).resize(function() {
        //   console.log($(window).width());
        //   console.log($(window).height());

        //   $("#map-canvas").width((($(window).width() * 1.9) / 3));
        //   $("#map-canvas").height((($(window).height() * 2.9) / 3));

        //   console.log($("#map-canvas").width());
        //   console.log($("#map-canvas").height());
        // });

        $("#map-canvas").width((($("#map_div").width() * 3) / 3));
        $("#map-canvas").height((($(window).height() * 2.75) / 3));

        // $("#sidebar").height((($("#map-canvas").height() * 2.635) / 3) - $(".searchRow").height());
        $("#mothersidebar").height($("#map-canvas").height() - $(".searchRow").height() * 0.5);

        if($(window).width() < 1000)
          {
            $("#map-canvas").height((($(window).height() * 1) / 3));
            $("#mothersidebar").height($(window).height() - $("#map-canvas").height() - $(".searchRow").height() * 0.5);
            
          }
         

        $( window ).resize(function() {
          console.log($(window).width());
          console.log($(window).height());

          $("#map-canvas").width((($("#map_div").width() * 3) / 3));
          $("#map-canvas").height((($(window).height() * 2.75) / 3));

          // $("#sidebar").height((($("#map-canvas").height() * 2.635) / 3) - $(".searchRow").height());
          $("#mothersidebar").height($("#map-canvas").height() - $(".searchRow").height() * 0.5);

          console.log($("#map-canvas").width());
          console.log($("#map-canvas").height());

          if($(window).width() < 1000)
          {
            $("#map-canvas").height((($(window).height() * 1) / 3));
            $("#mothersidebar").height($(window).height() - $("#map-canvas").height() - $(".searchRow").height() * 0.5);
           
          }

        });

    });

    

  </script>
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-65278937-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
  
</head>
  <body>



    <nav class="top-bar" data-topbar="">
        
        <ul class="title-area">
          <li class="name">
            <h1><a href="/"><img id="button_logo" src="../img/fixnation-logo-beta-inverse.png"></a></h1>  
          </li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        
        
      <section class="top-bar-section" style="left: 0%;">
          <ul class="right">
            <li class="active"><a style="background-color: gray;" href="/feedback">Feedback</a></li>
            <?if($currentUser){?>
              <li><a href="/profile"><img src="../img/placeholder.jpg" id="navProfileImage"><?=$currentUser->firstname.' '.$currentUser->lastname?></a></li>
              <li><a href="/jobs">My jobs</a></li>
            <?}
            else {
              ?>
              <li class="active"><a style="background-color: #FA8900;" href="/registration">Sign Up</a></li>
              <?}
            ?>
            <li><a href="/map">Help nearby</a></li>
            <li><a href="/<?=$currentUser ? 'logout':'login'?>"><?=$currentUser ? 'Logout':'Login'?></a></li>
          </ul>
      </section></nav>

  




    <div class="content callgray">
      <!-- <div class="row content"><div class="large-12 columns content"><div class="row content"> -->

    </br>

      <div id="map_div" class="large-8 columns">
        <div class="mapcanvas" id="map-canvas"></div>
      </div>


      <div id="mothersidebar" class="large-4 columns panel callgray">

        

        <div class="row searchRow callgray" > 



        <div class="row"><div class="small-12 columns"><label>What do you have a problem with?</label></div></div>

          <div class="row callgray"><div class="small-9 columns">
    
            {!! Form::open(array('url' => 'map/filter', 'class' => 'form')) !!}
            {!! Form::text('search', $usersData['search'],
                        array(
                              'class'=>'form-control search',
                              'placeholder'=>'e.g. printer')) !!}
                </div> <div class="small-3 small-left columns">
            {!! Form::submit('Search',
                      array('class'=>'btn btn-primary button tiny ')) !!}
            {!! Form::close() !!}
      
        
          </div></div>
      </div>

      <div id="sidebar">
      
      <?
      
      
      
      
      ?>
      
      <?foreach($users as $availableUser){?> 
        <div class="row panel card" id="expert<?=$availableUser->id?>" onclick="HighlightMarker('<?=$availableUser->id?>','<?=$sizeOfUsers?>')"> 
          <div class="row">
            <div class="large-3 columns">
              <img src="{{ URL::asset('img/placeholder.jpg') }}" class="profilepic" >
            </div>
            <div class="large-9 columns">
            <div class="row">
              <!-- style="height=100px, vertical-align: middle;" -->
                <div class="large-12 columns">
                  <h3><?=$availableUser->firstname.' '.$availableUser->lastname ?></h3>
                  
                </div>
                <!-- <div class="large-2 columns">
                    <span class="button alert tiny left" name="expertext<?=$availableUser->id?>" onclick="HighlightMarker('0','<?=$sizeOfUsers?>')" id="experthide<?=$availableUser->id?>"><b>X</b></span>
                </div> -->
            </div>
            <div class="row">

              <div class="large-6 columns">
                  <h3>
                  <?for ($i = 1; $i < 6; $i++){
                      ?><span class="fi-star" id="<?= ($i > $availableUser->rating ? 'un':'')?>selectedstar"></span><?
                  }?>
                     
                  </h3>
              </div>

              <div class="large-6 columns">
                
                <?if($availableUser->count){
                    echo '<span id="jobslarge">'.$availableUser->count.'</span> '.($availableUser->count == "1" ? 'job' : 'jobs');
                } 
                else {
                    echo '<span id="jobslarge"> 0 </span> jobs';
                }               
                
                
                ?>
                </span>
              </div>
              
            </div>
			<div class="row">
                <div class="large-12 columns">
                  Mon-Fri: <?=$availableUser->weekday_from?> - <?=$availableUser->weekday_to?>
                </div>
            </div>
			<div class="row">
                <div class="large-12 columns">
                  San-Sat: <?=$availableUser->weekend_from?> - <?=$availableUser->weekend_to?>
                </div>
            </div>
            <div class="row"><div class="large-12 columns">
        <?=$availableUser->street_number.' '.$availableUser->street.' '.$availableUser->city.' '.$availableUser->state.' '.$availableUser->country;?>
        </div></div>
            </div>
          </div>
          <hr name="expertext<?=$availableUser->id?>">
          <div class="row expertexpand text-center" name="expertext<?=$availableUser->id?>">
             <?=$availableUser->description?>
           </br></br>
          </div>
          <!-- <hr name="expertext<?=$availableUser->id?>"> -->
          <div class="row expertorder" name="expertext<?=$availableUser->id?>">
            <div class="large-12 columns large-centered text-center">
            <?if($currentUser){?>
             <a href="#" class="button expand" data-reveal-id="myModal<?=$availableUser->id?>">Request help from <?=$availableUser->firstname?></a>
             <input type="hidden" name="provider" value="<?=$availableUser->id?>">
                <div id="myModal<?=$availableUser->id?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                  
                  {!! Form::open(array('url' => 'jobs/create', 'class' => 'form')) !!}
                  
                <label class="large-centered text-center"><h3>Describe your problem:</h3>
                  {!! Form::textarea('description',  null,
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'example: Printer is not working or Cannot connect to the wifi')) !!}
                          <input type="hidden" name="provider" value="<?=$availableUser->id?>">
                         
          </label>   
          <div class="row large-centered text-center">      
                
                    {!! Form::submit('Get help from '.$availableUser->firstname,
                  array('class'=>'button large-centered text-center')) !!}
          
                    {!! Form::close() !!}
                  
                  </div>
                  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                  </div>
                  
            <?}
            else {  
                ?><a class="button expand" href="/registration">Register now to get help!</a><?         
            }?>
                  
                
            </div>
          </div>
        </div>
      <?}?>

    </div>

       

       


    </div></div><!-- </div></div></div> -->
    
    

    <ol class="joyride-list" data-joyride>
      <li data-id="firstStop" data-text="Next" data-options="tip_location: top; prev_button: false">
        <p>Hello and welcome to the Joyride <br>documentation page.</p>
      </li>
      <li data-id="numero1" data-class="custom so-awesome" data-text="Next" data-prev-text="Prev">
        <h4>Stop #1</h4>
        <p>You can control all the details for you tour stop. Any valid HTML will work inside of Joyride.</p>
      </li>
      <li data-id="numero2" data-button="Next" data-prev-text="Prev" data-options="tip_location:top;tip_animation:fade">
        <h4>Stop #2</h4>
        <p>Get the details right by styling Joyride with a custom stylesheet!</p>
      </li>
      <li data-button="End" data-prev-text="Prev">
        <h4>Stop #3</h4>
        <p>It works as a modal too!</p>
      </li>
    </ol>
    
    
    <script src="{{ URL::asset('js/foundation.min.js') }}"></script>
    <script>
      $(document).foundation();
    </script>

  </body>
</html>
