<!doctype html>
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
    <title>Fixnation | Sign Up</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/registration.css" />
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="{{ URL::asset('foundation-icons/foundation-icons.css') }}">
    <script src="js/registration.js"></script>
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
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script type="text/javascript">
    </script>
</head>

<body onload="initialize()">
<?$user=Auth::user();?>
<div class="fixed">
    <nav class="top-bar" data-topbar="" data-options="sticky_on: large;">

        <ul class="title-area">
            <li class="name">
                <h1><a href="/"><img id="button_logo" src="img/fixnation-logo-beta-inverse.png"></a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a>
            </li>
        </ul>

        <section class="top-bar-section" style="left: 0%;">
            <ul class="right">
                <li class="active"><a style="background-color: gray;" href="/feedback">Feedback</a>
                </li>
                <?if($user){?>
                    <li>
                        <a href="/profile"><img src="img/placeholder.jpg" id="navProfileImage">
                            <?=$user->firstname.' '.$user->lastname?></a>
                    </li>
                    <li><a href="/jobs">My jobs</a>
                    </li>
                <?} else { ?>
                    <li class="active"><a style="background-color: #FA8900;" href="/registration">Sign Up</a>
                    </li>
                <?} ?>
                <li><a href="/map">Help nearby</a>
                </li>
                <li>
                    <a href="/<?=$user ? 'logout':'login'?>">
                        <?=$user ? 'Logout': 'Login'?>
                    </a>
                </li>
            </ul>
        </section>
    </nav>
</div>

<div id="section1" class="sections">
</br>
</br>
</br>
</br>
</br>
<div class="row">
<div id="my_panel1" class="large-8 small-centered panel text-center">

<h2 class="text-center">Sign Up</h2>

</br>
</br>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul class="square text-left">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif {!! Form::open(array('url' => 'registration/save', 'class' => 'form', 'data-abide'=>'','id'=>'testForm', 'novalidate'=> 'novalidate', 'files'=>true )) !!}

<fieldset>

    <div class="row">
        <div class="large-12 columns">
            <div class="row">
                <div class="large-3 columns">
                    <label for="right-label" class="left inline">First name:</label>
                </div>
                <div class="large-9 columns">
                    {!! Form::text('firstname', null, array('required', 'class'=>'form-control', 'placeholder'=>'John', 'onkeypress'=>'return isNumberKey(event);', 'ondrop'=>'return false;', 'onpaste'=>'return false;' )) !!}
                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <label for="right-label" class="left inline">Last name:</label>
                </div>
                <div class="large-9 columns">
                    {!! Form::text('lastname', null, array('required', 'class'=>'form-control', 'placeholder'=>'Doe', 'onkeypress'=>'return isNumberKey(event);', 'ondrop'=>'return false;', 'onpaste'=>'return false;' )) !!}
                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <label for="right-label" class="left inline">Phone number:</label>
                </div>
                <div class="large-9 columns">
                    {!! Form::text('mobile', null, array( 'class'=>'form-control', 'placeholder'=>'+123456789123')) !!}
                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <label for="right-label" class="left inline">E-mail address:</label>
                </div>
                <div class="large-9 columns">
                    {!! Form::text('email', null, array('required', 'id' => 'tere', 'class'=>'form-control', 'placeholder'=>'john.doe@yourname.com')) !!}



                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <label for="right-label" class="left inline">Home address:</label>
                </div>
                <div class="large-9 columns" id="locationField">
                    <input id="autocomplete" class="addressFieldName" placeholder="123 5th Avenue, New York, NY, United States" onFocus="geolocate()" onblur="setTimeout(function() {validateClick();},500);" type="text" name="address_name"></input>
                    <label id="locationError" for="right-label" class="left inline">Please select address from dropdown</label>
                    <label id="flagLabel" data-flag-counter="0" data-flag="false">
                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <label for="right-label" class="left inline">Profile image</label>
                </div>
                <div class="large-9 columns" style="color:black;">
                    {!! Form::file('image', null, array('class' => 'form-control')) !!}
                </div>
                <div class="row">
                    <hr>
                </div>
                <div class="row">
                    <div class="large-3 columns">
                        <label for="right-label" class="left inline">Your password:</label>
                    </div>
                    <div class="large-9 columns">
                        {!! Form::password('password', null, array('required'=>'required', 'class'=>'form-control', 'id' => 'password', 'placeholder'=>'Password')) !!}
                        <small class="error">Passwords must be at least 6 characters.</small>
                    </div>
                </div>
                <div class="row">
                    <div class="large-3 columns">
                        <label for="right-label" class="left inline">Repeat password:</label>
                    </div>
                    <div class="large-9 columns">
                        {!! Form::password('password_confirmation', null, array('required'=>'required', 'id' => 'confirmPassword', 'class'=>'form-control', 'data-equalto'=>'password', 'placeholder'=>'Your e-mail address')) !!}
                        <small class="error">Passwords must match.</small>
                    </div>
                </div>
                <div class="row">
                    <hr>
                </div>
            </div>


            <div class="row">
                <div class="large-12 columns" id="" onclick="provideronoff()">
                    {!! Form::checkbox('provider',1,false, array( 'class'=>'form-control')) !!} {!! Form::label('Register as a Technician') !!}
                </div>
            </div>
            <div class="row">
                <hr>
            </div>
            <div class="row">
                <div class="large-12 columns" id="providerskills">
                    <label>Describe yout skills or problems, about which you are confident that you can fix: {!! Form::textarea('description', null, array( 'class'=>'form-control', 'id' => 'providerDescription', 'rows' => 10, 'cols' => 10, 'placeholder'=>'Reinstalling windows, repairing printers,...')) !!}
                    </label>


                    <div class="row">
                        <div class="large-5 columns">
                            <label for="right-label" class="left inline">Available times on weekdays:</label>
                        </div>
                        <div class="large-3 columns">
                            <select name="weekday_from">
                                <? for($hours=0; $hours<24; $hours++) // the interval for hours is '1' for($mins=0; $mins<60; $mins+=30) // the interval for mins is '30' echo '<option>'.str_pad($hours,2, '0',STR_PAD_LEFT). ':' .str_pad($mins,2, '0',STR_PAD_LEFT). '</option>'; ?>
                            </select>
                        </div>
                        <div class="large-1 columns">
                            <label for="right-label" class="inline">to</label>
                        </div>
                        <div class="large-3 columns">
                            <select name="weekday_to">
                                <? for($hours=0; $hours<24; $hours++) // the interval for hours is '1' for($mins=0; $mins<60; $mins+=30) // the interval for mins is '30' echo '<option>'.str_pad($hours,2, '0',STR_PAD_LEFT). ':' .str_pad($mins,2, '0',STR_PAD_LEFT). '</option>'; ?>
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="large-5 columns">
                            <label for="right-label" class="left inline">Available times on weekends:</label>
                        </div>
                        <div class="large-3 columns">
                            <select name="weekend_from">
                                <? for($hours=0; $hours<24; $hours++) // the interval for hours is '1' for($mins=0; $mins<60; $mins+=30) // the interval for mins is '30' echo '<option>'.str_pad($hours,2, '0',STR_PAD_LEFT). ':' .str_pad($mins,2, '0',STR_PAD_LEFT). '</option>'; ?>
                            </select>
                        </div>
                        <div class="large-1 columns">
                            <label for="right-label" class="inline">to</label>
                        </div>
                        <div class="large-3 columns">
                            <select name="weekend_to">
                                <? for($hours=0; $hours<24; $hours++) // the interval for hours is '1' for($mins=0; $mins<60; $mins+=30) // the interval for mins is '30' echo '<option>'.str_pad($hours,2, '0',STR_PAD_LEFT). ':' .str_pad($mins,2, '0',STR_PAD_LEFT). '</option>'; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <table id="address" style="display:none;">
                <tr>
                    <td class="label">Street address</td>
                    <td class="slimField">
                        <input class="field" id="street_number" name="street_number" disabled="true"></input>
                    </td>
                    <td class="wideField" colspan="2">
                        <input class="field" id="route" name="route" disabled="true"></input>
                    </td>
                </tr>
                <tr>
                    <td class="label">City</td>
                    <td class="wideField" colspan="3">
                        <input class="field" id="locality" name="locality" disabled="true"></input>
                    </td>
                </tr>
                <tr>
                    <td class="label">State</td>
                    <td class="slimField">
                        <input class="field" id="administrative_area_level_1" name="administrative_area_level_1" disabled="true"></input>
                    </td>
                    <td class="label">Zip code</td>
                    <td class="wideField">
                        <input class="field" id="postal_code" name="postal_code" disabled="true"></input>
                    </td>
                </tr>
                <tr>
                    <td class="label">Country</td>
                    <td class="wideField" colspan="3">
                        <input class="field" id="country" name="country" disabled="true"></input>
                    </td>
                </tr>
            </table>

            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">


            <div class="form-group">

                {!! Form::submit('Sign me up!', array('class'=>'button medium expand green')) !!}

            </div>
            {!! Form::close() !!}
        </div>
</fieldset>
</br>
</br>
</div>
</div>
</div>

<div class="footer">

    <div class="row">
        <div class="large-4 columns links text-center">
            </br>
            </br>
            </br>
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
            </br>
            </br>
            </br>
            2015 © fixnation
        </div>
    </div>
    </br>
    </br>
</div>
<script>
    $(document).foundation();
</script>
</body>
</html>