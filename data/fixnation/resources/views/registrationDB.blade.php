<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="js/jquery-2.1.4.min.js">
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
                console.log(place.geometry.location);

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

        <style>
            #locationField, #controls {
                position: relative;
                width: 480px;
            }
            #autocomplete {
                position: absolute;
                top: 0px;
                left: 0px;
                width: 99%;
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
    </head>
    <body onload="initialize()">

            {!! Form::open(array('url' => 'registration/save', 'class' => 'form')) !!}
            <div class="form-group">
                {!! Form::label('First Name') !!}
                {!! Form::text('firstname', null,
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'Your name')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Last Name') !!}
                {!! Form::text('lastname', null,
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'Your name')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Your E-mail Address') !!}
                {!! Form::text('email', null,
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'Your e-mail address')) !!}
                {{!! $errors->first('email') !!}}
            </div>

            <div class="form-group">

                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', null,
                array('required',
                'class'=>'form-control',
                'placeholder'=>'Your e-mail address')) !!}

            </div>
            <div class="form-group">

                {!! Form::label('password_confirmation', 'Password confirmation')!!}
                {!! Form::password('password_confirmation', null,
                array('required',
                'class'=>'form-control',
                'placeholder'=>'Your e-mail address')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Provider') !!}
                {!! Form::checkbox('provider', null,
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'Your message')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Mobile') !!}
                {!! Form::text('mobile', null,
                    array(
                          'class'=>'form-control',
                          'placeholder'=>'Your mobile')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description') !!}
                {!! Form::text('description', null,
                    array(
                          'class'=>'form-control',
                          'placeholder'=>'What can you fix')) !!}
            </div>

            <div id="locationField">
                <input id="autocomplete" placeholder="Enter your address"
                       onFocus="geolocate()" type="text" name="address_name"></input>
            </div>

            <table id="address" style="display: none;">
                <tr>
                    <td class="label">Street address</td>
                    <td class="slimField"><input class="field" id="street_number" name="street_number"
                                                 disabled="true"></input></td>
                    <td class="wideField" colspan="2"><input class="field" id="route"
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
                {!! Form::submit('Register',
                  array('class'=>'btn btn-primary')) !!}
            </div>
            {!! Form::close() !!}

            </div>



    </body>

</html>
