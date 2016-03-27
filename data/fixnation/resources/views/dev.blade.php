<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Find tech savvy people in your area to fix your IT issues">
<meta name="keywords" content="fix,repair,broken,computer,windows,smartphone,android,wifi,printer,technician,doha,quatar">
<meta name="author" content="Fixnation">
<meta name="robots" content="index, follow">
<meta property="og:locale" content="en_US" />
<meta property="og:title" content="Fixnation = Tech help around the corner" />
<meta property="og:description" content="Find tech savvy people in your area to fix your IT issues" />
<meta property="og:image" content="http://www.fixnation.co/img/facebookog.jpg" />
<meta property="og:url" content="http://www.fixnation.co/" />
    <title>Fixnation | Sign Up</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/registration_style.css" />
    <link rel="stylesheet" href="css/general.css" />
      <link rel="stylesheet" href="{{ URL::asset('foundation-icons/foundation-icons.css') }}">
    <script src="js/vendor/modernizr.js"></script>
	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
	<link rel="stylesheet" href="js/jquery-2.1.4.min.js">
    <link rel="stylesheet" href="css/footer.css" />
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
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <style>
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }

            #map-canvas{
                height: 300px;
                width: 1000px;
                margin: 0;
                padding: 0;
            }

            .controls {
                margin-top: 16px;
                border: 1px solid transparent;
                border-radius: 2px 0 0 2px;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                height: 32px;
                outline: none;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            }

            #pac-input {
                background-color: #fff;
                font-family: Roboto;
                font-size: 15px;
                font-weight: 300;
                margin-left: 12px;
                padding: 0 11px 0 13px;
                text-overflow: ellipsis;
                width: 400px;
            }

            #pac-input:focus {
                border-color: #4d90fe;
            }

            .pac-container {
                font-family: Roboto;
            }

            #type-selector {
                color: #fff;
                background-color: #4d90fe;
                padding: 5px 11px 0px 11px;
            }

            #type-selector label {
                font-family: Roboto;
                font-size: 13px;
                font-weight: 300;
            }

        </style>


        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
        <script>
            // This example displays an address form, using the autocomplete feature
            // of the Google Places API to help users fill in the information.

            var placeSearch, autocomplete;
            var componentForm = {
                street_number: 'short_name',
                route: 'long_name',
                locality: 'long_name',
                administrative_area_level_1: 'short_name',
                country: 'long_name',
                postal_code: 'short_name'
            };

            function initialize() {
                document.getElementById("providerskills").style.visibility="hidden";
                document.getElementById("providerskills").style.height="0px";
                // Create the autocomplete object, restricting the search
                // to geographical location types.
                autocomplete = new google.maps.places.Autocomplete(
                    /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
                    { types: ['geocode'] });
                // When the user selects an address from the dropdown,
                // populate the address fields in the form.
                google.maps.event.addListener(autocomplete, 'place_changed', function() {
					var flagLabel = $('#flagLabel');					
					flagLabel.attr('data-flag', "true");	
					var counter = parseInt(flagLabel.attr('data-flag-counter'));
					flagLabel.attr('data-flag-counter', ++counter);		
                    fillInAddress();
                });
            }

            // [START region_fillform]
            function fillInAddress() {
                // Get the place details from the autocomplete object.
                var place = autocomplete.getPlace();                

                document.getElementById("latitude").value = place.geometry.location.A;
                document.getElementById("longitude").value = place.geometry.location.F;

                for (var component in componentForm) {
                    document.getElementById(component).value = '';
                    document.getElementById(component).disabled = false;
                }

                // Get each component of the address from the place details
                // and fill the corresponding field on the form.
                for (var i = 0; i < place.address_components.length; i++) {
                    var addressType = place.address_components[i].types[0];
                    if (componentForm[addressType]) {
                        var val = place.address_components[i][componentForm[addressType]];
                        document.getElementById(addressType).value = val;
                    }
                }
            }
            // [END region_fillform]

            // [START region_geolocation]
            // Bias the autocomplete object to the user's geographical location,
            // as supplied by the browser's 'navigator.geolocation' object.
            function geolocate() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var geolocation = new google.maps.LatLng(
                            position.coords.latitude, position.coords.longitude);
                        var circle = new google.maps.Circle({
                            center: geolocation,
                            radius: position.coords.accuracy
                        });
                        autocomplete.setBounds(circle.getBounds());
                    });
                }
            }
            // [END region_geolocation]

        </script>
		<script>
                    function provideronoff() {
                        
                        var chboxs = document.getElementsByName("provider");
                        var i;
                            for (i = 0; i < chboxs.length; i++) {
                                if(chboxs[i].checked==true){
                                    document.getElementById("providerskills").style.visibility="visible";
                                    document.getElementById("providerskills").style.height="auto"; 
									document.getElementById("providerDescription").setAttribute("required", "required");
								
                                }
                                else {
                                    document.getElementById("providerskills").style.visibility="hidden";
                                    document.getElementById("providerskills").style.height="0px";
									document.getElementById("providerDescription").removeAttribute("required");
   
      
                                    }
                                } 
                    }
                </script>	
				<script>
                    function validateClick(){
																
						var flagLabel = $('#flagLabel');
						var flagCounter = flagLabel.attr('data-flag-counter');	
						
						if(flagCounter == "0"){
							
							var addressField = $('.addressFieldName');
							addressField.val('');
							
							$('#street_number').val('');
							$('#route').val('');
							$('#locality').val('');
							$('#administrative_area_level_1').val('');
							$('#postal_code').val('');
							$('#country').val('');
							$('#latitude').val('');
							$('#longitude').val('');
				
						}
						
						flagLabel.attr('data-flag-counter', "0")						

					}
  
                </script>

        <style>
            #locationField, #controls {
                position: relative;

            }
			
            #autocomplete {
                position: absolute;
                top: 0px;
                left: 1.5%;
                width: 97%;
            }
            .label {
                text-align: right;
                font-weight: bold;
                width: 100px;
                color: #303030;
            }
            #address {
                border: 1px solid #000090;
                background-color: #f0f0ff;
                width: 480px;
                padding-right: 2px;
            }
            #address td {
                font-size: 10pt;
            }
            .field {
                width: 99%;
            }
            .slimField {
                width: 80px;
            }
            .wideField {
                width: 200px;
            }
            #locationField {
                height: 20px;
                margin-bottom: 2px;
            }
        </style>
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
  <body onload="initialize()">
	<?$user = Auth::user();?>
   <div class="fixed">

   <nav class="top-bar" data-topbar="" data-options="sticky_on: large;">
        
        <ul class="title-area">
          <li class="name">
            <h1><a href="/"><img id="button_logo" src="img/fixnation-logo-inverse.png"></a></h1>  
          </li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        
        
      <section class="top-bar-section" style="left: 0%;">
          <ul class="right">
            <?if($user){?>
              <li><a href="/profile"><img src="img/placeholder.jpg" id="navProfileImage"><?=$user->firstname.' '.$user->lastname?></a></li>
              <li><a href="/jobs">My jobs</a></li>
            <?}
            else {
              ?>
              <li class="active"><a style="background-color: #FA8900;" href="/registration">Sign Up</a></li>
              <?}
            ?>
            <li><a href="/map">Help nearby</a></li>
            <li><a href="/<?=$user ? 'logout':'login'?>"><?=$user ? 'Logout':'Login'?></a></li>
          </ul>
      </section></nav>

</div>


    
    <div id="section1" class="sections">

  
     <!--  <img class="section_bg" src="http://static.wallpedes.com/wallpaper/chip/chip-computer-wallpapers-desktop-backgrounds-id-technology-wallpaper-1920x1080-wallpapers-hd-for-mobile-free-download-windows-7-1366x768-iphone-photoshop-tutorial-android.jpg"> -->
   </br></br></br></br></br>
      <div class="row">
        <div id="my_panel1" class="large-8 small-centered panel text-center">
          
          <h2 class="text-center">Sign Up</h2>

        </br></br>
		
		@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul class="square text-left">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
       
	   {!! Form::open(array('url' => 'registration/save', 'class' => 'form', 'data-abide'=>'','id'=>'testForm', 'novalidate'=> 'novalidate' )) !!}
            
                <fieldset>               

                  <div class="row">
                    <div class="large-12 columns">
                    <div class="row">
                        <div class="large-3 columns">
                            <label for="right-label" class="left inline">First name:</label>
                        </div>
                        <div class="large-9 columns">
        					{!! Form::text('firstname', null,
                            array('required',
                                  'class'=>'form-control',
                                  'placeholder'=>'John')) !!}
                        </div>	 
                    </div>
                    <div class="row">
    					<div class="large-3 columns">
                          <label for="right-label" class="left inline">Last name:</label>
                        </div>
                        <div class="large-9 columns">
        					{!! Form::text('lastname', null,
                            array('required',
                                  'class'=>'form-control',
                                  'placeholder'=>'Doe')) !!}
                        </div>
                    </div>
					<div class="row"> 
                        <div class="large-3 columns">
                          <label for="right-label" class="left inline">Phone number:</label>
                        </div>
                        <div class="large-9 columns">	  
        				    {!! Form::text('mobile', null,
        						array(
        					  'class'=>'form-control',
        					  'placeholder'=>'+123456789123')) !!}
                       </div>
                    </div>
                    <div class="row"> 
                        <div class="large-3 columns">
                          <label for="right-label" class="left inline">E-mail address:</label>
                        </div>
                        <div class="large-9 columns">
        					{!! Form::text('email', null,
                            array('required',
							'id' => 'tere',
                                  'class'=>'form-control',
                                  'placeholder'=>'john.doe@yourname.com')) !!}
								  
                            
							
    					</div>
                    </div>
                    <div class="row"> 
                        <div class="large-3 columns">
                          <label for="right-label" class="left inline">Home address:</label>
                        </div>
                        <div class="large-9 columns" id="locationField">
        						<input id="autocomplete" class="addressFieldName" placeholder="123 5th Avenue, New York, NY, United States" onFocus="geolocate()" onblur="setTimeout(function() {validateClick();},500);" type="text" name="address_name"></input>						
								<label id="flagLabel"  data-flag-counter="0" data-flag="false">
						</div>
                    </div>
                    <div class="row">
                        <hr>
                    </div>
                    <div class="row"> 
                        <div class="large-3 columns">
                          <label for="right-label" class="left inline">Your password:</label>
                        </div>
                        <div class="large-9 columns">
        					{!! Form::password('password', null,
        						array('required'=>'required', 
        						'class'=>'form-control',
        						'id' => 'password',
        						'placeholder'=>'Password')) !!}
					        <small class="error">Passwords must be at least 6 characters.</small>
                        </div>
                    </div>
					<div class="row"> 
                        <div class="large-3 columns">
                          <label for="right-label" class="left inline">Repeat password:</label>
                        </div>
                        <div class="large-9 columns">
        					{!! Form::password('password_confirmation', null,
        						array('required'=>'required', 
        						'id' => 'confirmPassword',
        						'class'=>'form-control',
        						'data-equalto'=>'password',
        						'placeholder'=>'Your e-mail address')) !!}
					        <small class="error">Passwords must match.</small>	
                        </div>
                    </div>
                    <div class="row">
                        <hr> 
                    </div>
                </div>
                
                </div>										  
			    <div class="row"> 
                    <div class="large-12 columns" id="" onclick="provideronoff()">
    					{!! Form::checkbox('provider',1,false,
                                array(
                                'class'=>'form-control')) !!}
                         {!! Form::label('Register as a Technician') !!}
                    </div>
                </div>
                <div class="row">
                    <hr> 
                </div>
                <div class="row"> 
                    <div class="large-12 columns" id="providerskills">
                    <label>Describe yout skills or problems, about which you are confident that you can fix:
    					{!! Form::textarea('description', null,
    							array(
                              'class'=>'form-control',
							  'id' => 'providerDescription',
    						  'rows' => 10,
    						  'cols' => 10,
                              'placeholder'=>'Reinstalling windows, repairing printers,...')) !!}
                    </label>
					</div>
                </div>

				<table id="address" style="display:none;">
					<tr>
						<td class="label">Street address</td>
						<td class="slimField"><input class="field" id="street_number" name="street_number"
													 disabled="true"></input></td>
						<td class="wideField" colspan="2"><input class="field" id="route" name="route"
																 disabled="true"></input></td>
					</tr>
					<tr>
						<td class="label">City</td>
						<td class="wideField" colspan="3"><input class="field" id="locality" name="locality"
																 disabled="true"></input></td>
					</tr>
					<tr>
						<td class="label">State</td>
						<td class="slimField"><input class="field"
													 id="administrative_area_level_1" name="administrative_area_level_1" disabled="true"></input></td>
						<td class="label">Zip code</td>
						<td class="wideField"><input class="field" id="postal_code" name="postal_code"
													 disabled="true"></input></td>
					</tr>
					<tr>
						<td class="label">Country</td>
						<td class="wideField" colspan="3"><input class="field"
																 id="country" name="country" disabled="true"></input></td>
					</tr>
				</table>
			
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
			
			
			<div class="form-group">
			
			{!! Form::submit('Sign me up!',
						array('class'=>'button medium expand green')) !!}
						
            </div>
            {!! Form::close() !!}
						  
                      
                       
					
                    
                  </div>

                </fieldset></br></br>
          

           

            

      

        </div>
      </div>
    

    </div>


    <div class="footer">
     
        <div class="row">
            <div class="large-4 columns links text-center">
                </br></br></br>
                <a href="/about">About</a> &nbsp&nbsp | &nbsp&nbsp 
                <a href="mailto:fixnation@fixnation.co?Subject=General%20contact" target="_top">Contact</a>
            </div>

            <div class="large-4 columns social text-center">
              </br>
                <a href="https://www.facebook.com/fixnation" target="_blank"><i class="fi-social-facebook"></i></a>
                <a href="https://twitter.com/fixnationco" target="_blank"><i class="fi-social-twitter"></i></a>
                <a href="https://www.linkedin.com/company/fixnation-co/" target="_blank"><i class="fi-social-linkedin"></i></a>
               
            </div>
            <div class="large-4 columns copyright text-center">
              </br></br></br>
                2015 © fixnation
            </div>
        </div>
      </br></br>
    </div>
    
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
