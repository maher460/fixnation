<!doctype html>

<?
use App\User;
?>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Find tech savvy people in your area to fix your tech issues">
<meta name="keywords" content="fix,repair,broken,computer,windows,smartphone,android,wifi,printer,technician,doha,quatar">
<meta name="author" content="Fixnation">
<meta name="robots" content="index, follow">
<meta property="og:locale" content="en_US" />
<meta property="og:title" content="Fixnation = Tech help around the corner" />
<meta property="og:description" content="Find tech savvy people in your area to fix your tech issues" />
<meta property="og:image" content="http://www.fixnation.co/img/facebookog.jpg" />
<meta property="og:url" content="http://www.fixnation.co/" />
    <title>Fixnation | Profile</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/profile.css" />
	<link rel="stylesheet" href="{{ URL::asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('foundation-icons/foundation-icons.css') }}">
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/profile.js"></script>
    <link rel="stylesheet" href="css/footer.css" />
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
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
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
		<?
$user = $userArray[0];

$model = Auth::user();

?>
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
                provideronoff();
                document.getElementById("providerskills").style.visibility=<?=$user->provider == 1 ? '""':'"hidden"'?>;
                // Create the autocomplete object, restricting the search
                // to geographical location types.
                autocomplete = new google.maps.places.Autocomplete(
                    /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
                    { types: ['geocode'] });
                // When the user selects an address from the dropdown,
                // populate the address fields in the form.
                google.maps.event.addListener(autocomplete, 'place_changed', function() {
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


  </head>
  <body onload="initialize()">

    <div class="fixed">
        <nav class="top-bar" data-topbar="" data-options="sticky_on: large;">
            <ul class="title-area">
              <li class="name">
                <h1><a href="/"><img id="button_logo" src="img/fixnation-logo-beta-inverse.png"></a></h1>
              </li>
              <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>
          <section class="top-bar-section" style="left: 0%;">
              <ul class="right">
                <li class="active"><a style="background-color: gray;" href="/feedback">Feedback</a></li>
                <?if($user){?>
                  <li><a href="/profile"><img src="img/placeholder.jpg" id="navProfileImage"><?=$user->firstname.' '.$user->lastname?></a></li>
                  <li><a href="/jobs"><?=$model->getPendingJobsAmount() ? '<span id="notifjobs">'.$model->getPendingJobsAmount().'</span>':''?>My jobs</a></li>
                <?}
                else {
                  ?>
                  <li class="active"><a style="background-color: #FA8900;" href="/registration">Sign Up</a></li>
                  <?}
                ?>
                <li><a href="/map">Help nearby</a></li>
                <li><a href="/<?=$user ? 'logout':'login'?>"><?=$user ? 'Logout':'Login'?></a></li>
              </ul>
          </section>
        </nav>
    </div>
    <div id="section1" class="sections">
        </br></br></br></br>
        <div class="row">
            <div id="my_panel1" class="large-12 columns panel">
                </br>
                <div class="row">
                    <div class="large-2 columns large-centered">
                        <h2>Profile</h2>
                    </div>
                </div>
                    <div class="large-8 columns large-centered">
                       @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    {!! Form::open(array('url' => 'profile/save', 'class' => 'form', 'data-abide'=>'', 'id'=>'testForm', 'files'=>true )) !!}
                     <fieldset>
                     <div class="row">
                         <div class="large-12 columns">
                             <div class="row">
                                <div class="large-3 columns">
                                    <label for="right-label" class="left inline">First name:</label>
                                </div>
                                <div class="large-9 columns error">

                                  {!! Form::text('firstname', $user->firstname,
                                    array('required',
                                          'class'=>'form-control',
                                          'data-invalid'=>'',
                                          'aria-invalid'=>'true',
                                          'placeholder'=>'First name',
                                          'onkeypress'=>'return isNumberKey(event);',
                                          'ondrop'=>'return false;',
                                          'onpaste'=>'return false;'
                                          )) !!}
                                </div>
                            </div>
                            <div class="row">
                            <div class="large-3 columns">
                                <label for="right-label" class="left inline">Last name:</label>
                            </div>
                            <div class="large-9 columns">
                              {!! Form::text('lastname',  $user->lastname,
                                array('required',
                                      'class'=>'form-control',
                                      'placeholder'=>'Last name',
                                      'onkeypress'=>'return isNumberKey(event);',
                                      'ondrop'=>'return false;',
                                      'onpaste'=>'return false;'
                                      )) !!}
                            </div>
                         </div>
                         <div class="row">
                            <div class="large-3 columns">
                                <label for="right-label" class="left inline">Phone number:</label>
                            </div>
                         <div class="large-9 columns">
                             {!! Form::text('mobile', $user->mobile,
                            array(
                                  'class'=>'form-control',
                                  'placeholder'=>'Your mobile')) !!}
                         </div>
                     </div>
                     <div class="row">
                        <div class="large-3 columns">
                          <label for="right-label" class="left inline">E-mail address:</label>
                        </div>
                        <div class="large-9 columns">
                          {!! Form::text('email',  $user->email,
                            array('required',
                                  'class'=>'form-control',
                                  'placeholder'=>'Your e-mail address')) !!}
                            <small class="error"></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-3 columns">
                          <label for="right-label" class="left inline">Home address:</label>
                        </div>
                        <div class="large-9 columns" id="locationField">
						{!! Form::text('address_name',  $user->street_number.' '.$user->city.' '.$user->state.' '.$user->country,
						array(
							'id'=> 'autocomplete',
							'onfocus'=>'geolocate()',
                          'class'=>'form-control',
                          'placeholder'=>'123 5th Avenue, New York, NY, United States')) !!}

                        </div>
                    </div>
					<div class="row">
                        <div class="large-3 columns">
                          <label for="right-label" class="left inline">Profile image</label>
                        </div>
                        <div class="large-9 columns" style="color:black;">
        					{!! Form::file('image', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="row">
                        <hr>
                    </div>
                </div>
                </div>
          <div class="row">
                    <div class="large-12 columns providerBox" id="" onclick="provideronoff()">
              <input  name="provider"  type="checkbox" value="1" <?=$user->provider == 1 ? 'checked="checked"':''?>>
                         <label for="I WANT TO BECOME A SERVICE PROVIDER">Register as a Technician</label>
                    </div>
                </div>
                <div class="row">
                    <hr>
                </div>
                <div class="row">
                    <div class="large-12 columns text-center" id="providerskills" >
                    <label>Describe yout skills or problems, about which you are confident that you can fix:
              <textarea class="form-control" rows="10" id="providerDescription" cols="10" placeholder="Reinstalling windows, repairing printers,..." name="description" <?=$user->provider == 1 ? 'required="required"':''?> ><?=$user->description?></textarea>
                    </label>


						<div class="row">
                        <div class="large-5 columns">
                          <label for="right-label" class="left inline">Available times on weekdays:</label>
                        </div>
                        <div class="large-3 columns">
							<select name="weekday_from">
								<?
								for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
									for($mins=0; $mins<60; $mins+=30) // the interval for mins is '30'
										echo '<option '.($user->weekday_from == (str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT)) ? 'selected':'').' >'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
													   .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';
								 ?>
							</select>
                        </div>
						<div class="large-1 columns">
                          <label for="right-label" class="inline">to</label>
                        </div>
						<div class="large-3 columns">
							<select name="weekday_to">
								<?
								for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
									for($mins=0; $mins<60; $mins+=30) // the interval for mins is '30'
										echo '<option '.($user->weekday_to == (str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT)) ? 'selected':'').' >'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
													   .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';
								 ?>
							</select>
                        </div>
                    </div>


					<div class="row">
                        <div class="large-5 columns">
                          <label for="right-label" class="left inline">Available times on weekends:</label>
                        </div>
                        <div class="large-3 columns">
							<select name="weekend_from">
								<?
								for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
									for($mins=0; $mins<60; $mins+=30) // the interval for mins is '30'
										echo '<option '.($user->weekend_from == (str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT)) ? 'selected':'').'>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
													   .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';
								 ?>
							</select>
                        </div>
						<div class="large-1 columns">
                          <label for="right-label" class="inline">to</label>
                        </div>
						<div class="large-3 columns">
							<select name="weekend_to">
								<?
								for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
									for($mins=0; $mins<60; $mins+=30) // the interval for mins is '30'
										echo '<option '.($user->weekend_to == (str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT)) ? 'selected':'').' >'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
													   .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';
								 ?>
							</select>
                        </div>
                    </div>


          </div>
                </div>


        <table id="address" style="display:none;">
          <tbody><tr>
            <td class="label">Street address</td>
			<td class="slimField">
			{!! Form::text('street_number', $user->street_number,
						array(
							'id'=> 'street_number',
                            'class'=>'field',
                                             )) !!}
            </td>
            <td class="wideField" colspan="2">
			{!! Form::text('route', $user->street,
						array(
							'id'=> 'route',
                            'class'=>'field',
                                             )) !!}
											 </td>
          </tr>
          <tr>
            <td class="label">City</td>
            <td class="wideField" colspan="3">
			{!! Form::text('locality', $user->city,
						array(
							'id'=> 'locality',
                            'class'=>'field',
                                             )) !!}
											 </td>
          </tr>
          <tr>
            <td class="label">State</td>
            <td class="slimField">
			{!! Form::text('administrative_area_level_1', $user->state,
						array(
							'id'=> 'administrative_area_level_1',
                            'class'=>'field',
                                             )) !!}
											 </td>
            <td class="label">Zip code</td>
            <td class="wideField">
			{!! Form::text('postal_code', $user->zip,
						array(
							'id'=> 'postal_code',
                            'class'=>'field',
                                             )) !!}</td>
          </tr>
          <tr>
            <td class="label">Country</td>
            <td class="wideField" colspan="3">
			{!! Form::text('country', $user->country,
						array(
							'id'=> 'country',
                            'class'=>'field',
                                             )) !!}
											 </td>
          </tr>
        </tbody></table>

            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">


      <div class="form-group">

      <input class="button expand" style="background-color: #FA8900;" type="submit" value="Update my profile">

            </div>






                  </fieldset></form>



        </div>
      </div>
    </br></br></br></br></br></br></br>

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

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
