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
    <title>Fixnation | About us</title>
	<link rel="stylesheet" href="{{ URL::asset('css/general.css') }}">
      <link rel="stylesheet" href="{{ URL::asset('foundation-icons/foundation-icons.css') }}">
      <link rel="stylesheet" href="{{ URL::asset('css/about_page_style.css') }}">
      {!! HTML::style('css/foundation.css'); !!}
      {!! HTML::style('css/login_style.css'); !!}
      {!! HTML::script('js/vendor/modernizr.js'); !!}
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

		</br></br></br></br></br></br>
      <div class="row text-center">

        <div id="my_panel1" class="large-12 small-centered columns panel text-center">
          <div class="row">
            <h2 class="text-center">About fixnation</h2>
          </div>
          <div class="row">
            <div class="large-10 small-centered columns">
              <p>Founded in July 2015, Fixnation was born as a collaboration between 5 university students from different countries. Fixnation is a trusted marketplace to list, discover and find convenient and affordable tech help in your communities - on your laptops and mobile devices.</p>
            </div>
          </div>   
        </div>
      </div>
      </br></br>
      <div class="row text-center">
        <div id="my_panel1" class="large-12 small-centered columns panel text-center">
          <div class="row">
            <h2 class="text-center">Our team</h2>
          </div>
          </br></br>

          <div class="row text-center">

            <div class="large-10 large-centered columns">
              <div class="row">
                  <img src="img/about/sampriti.jpg" class="profilepic">
              </div>
              <div class="row">
                <h3>Sampriti Jain</h3>
                <p><em>Marketing</em></p>
              </div>
              <div class="row">
                <p>Sampriti Jain is a 20 year old from New Delhi, India currently enrolled in  the Bachelors of Science program in Business Administration at Carnegie Mellon University.She is handling business, marketing and outreach related to Fixnation.</p>
              </div>
            </div>
          </div>
          </br><hr></br>
          <div class="row text-center">

            <div class="large-10 large-centered columns">
              <div class="row">
                  <img src="img/about/karl.jpg" class="profilepic">
              </div>
              <div class="row">
                <h3>Karl-Martin Miidu</h3>
                <p><em>Lead Software Development (back-end)</em></p>
              </div>
              <div class="row">
                <p>Karl-Martin Miidu, 21 years old from Tallinn, Estonia, is studying Informatics in Tallinn University of Technology. He just finished 2nd year in his bachelor's studies. He works in an Estonian software development company called Scoro, as a software engineer. His role in the fixnation startup is the main backend web application developer.</p>
              </div>
            </div>
          </div>
          </br><hr></br>
          <div class="row text-center">

            <div class="large-10 large-centered columns">
              <div class="row">
                  <img src="img/about/ahmed.jpg" class="profilepic">
              </div>
              <div class="row">
                <h3>Muhammad Ahmed Shah</h3>
                <p><em>Business</em></p>
              </div>
              <div class="row">
                <p>Muhammad Ahmed Shah, 20 years old from Karachi, Pakistan, is currently enrolled in Bachelors of Science program in Computer Science at Carnegie Mellon University. Ahmed is working as the perfect business meets tech side for Fixnation.</p>
              </div>
            </div>
          </div>
          </br><hr></br>
          <div class="row text-center">

            <div class="large-10 large-centered columns">
              <div class="row">
                  <img src="img/about/tomas.jpg" class="profilepic">
              </div>
              <div class="row">
                <h3>Tomas Mesaros</h3>
                <p><em>Product Manager</em></p>
              </div>
              <div class="row">
                <p>Tomas Mesaros, 23 years old from Slovakia. Finished bachelor degree in Business Informatics at the University of Economics in Bratislava, Slovakia and MBA degree at Economics and Financial Management at the Central European Management Institute, Prague, Czech Republic. Currently working on his MSc degree in Managerial Decision Making and IT at the University of Economics in Bratislava, Slovakia</p>
              </div>
            </div>
          </div>
          </br><hr></br>
          <div class="row text-center">

            <div class="large-10 large-centered columns">
              <div class="row">
                  <img src="img/about/maher.jpg" class="profilepic">
              </div>
              <div class="row">
                <h3>Maher Khan</h3>
                <p><em>Software Development (front-end)</em></p>
              </div>
              <div class="row">
                <p>Maher Khan, 22 years old from Bangladesh, is currently studying BSc in Information Systems with a minor in Computer Science at Carnegie Mellon University. Fixnation is one of the few startups that he is working on as a software developer. His role in the fixnation startup is the main frontend web application developer. </p>
              </div>
            </div>
          </div>


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
