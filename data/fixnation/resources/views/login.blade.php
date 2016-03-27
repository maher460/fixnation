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
<title>Fixnation | Login</title>
{!! HTML::style('css/foundation.css'); !!}
{!! HTML::script('js/vendor/modernizr.js'); !!}
{!! HTML::style('css/login_style.css'); !!}
<link rel="stylesheet" href="{{ URL::asset('foundation-icons/foundation-icons.css') }}">
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

   <div class="fixed">
   
   <?$user = Auth::user();?>

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

		</br></br></br></br></br></br></br></br>
      <div class="row text-center">

        <div id="my_panel1" class="large-5 small-centered columns panel text-center">
          
          <h2 class="text-center">Login</h2>

        </br></br>
		
		@if (count($errors) > 0)
				<div class="alert alert-danger text-left">
					<ul class="square error_list">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
       
            {!! Form::open(array('url' => 'login', 'class' => 'form')) !!}
              
              <div class="row">
                <div class="large-3 columns">
                  <label for="right-label" class="left inline">Email:</label>
                </div>
                <div class="large-9 columns">                              
                  <input name="email" type="text" placeholder="john.doe@yourname.com"/>
                </div>
              </div>
              <div class="row">
                <div class="large-3 columns">
                  <label for="right-label" class="left inline">Password:</label>
                </div>
                <div class="large-9 columns">   
                  <input name="password" type="password" placeholder="password" />   
                </div>                  
              </div>


          </br></br>



            {!! Form::submit('Login', array('class'=>'button expand')) !!}
			
			{!! HTML::link('/registration', 'Register', array('class' => 'button'))!!}
			{!! Form::close() !!}
                  
        </div>
      </div>
      </br></br>

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


   {!! HTML::script('js/vendor/jquery.js'); !!}
   {!! HTML::script('js/foundation.min.js'); !!}
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
