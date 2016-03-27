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
    <meta property="og:image" content="http://www.fixnation.co/img/facebookog.jpg?v=1" />
    <meta property="og:url" content="http://www.fixnation.co/" />
    <title>Fixnation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/landing_page_style.css" />
    <script src="js/vendor/modernizr.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('foundation-icons/foundation-icons.css') }}">
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
	<style>
		@keyframes notifanim {
                0% {background-color: none;}
                50% {background-color: #fa8900;}
                100% {background-color: none;}
            }
            #notifjobs {
                margin-right: 5px;
                background: none;
                padding-top: 3px;
                padding-bottom: 3px;
                padding-left: 5px;
                padding-right: 5px;
                font-weight: bolder;
                border-radius: 10px;
                animation-name: notifanim;
                animation-duration: 3s;
                animation-iteration-count:infinite;
            }
	
	</style>

    <div id="beta_message" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
          <div class="row"><div class="large-12 columns text-center">
        <div class="row"><h2 id="modalTitle">Welcome to Fixnation!</h2></div>
        <div class="row"><p class="lead">The website is still in it's beta version and you may come across some issues. </br> Feel free to leave us feedback. </br> A big thanks for using this website!</p>
        <!-- <p><em>Best, the fixnation team</em></p> --> </div>
        <div class="row"><a id="close_beta_message" class="button expand">Start exploring!</a></div>
          </div></div>
    </div>
	   
  </head>
  <body>
	<?$user = Auth::user();?>
   <div class="fixed">

    <nav class="top-bar" data-topbar="">
        
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
              <li><a href="/jobs"><?=$user->getPendingJobsAmount() ? '<span id="notifjobs">'.$user->getPendingJobsAmount().'</span>':''?>My jobs</a></li>
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

  
   
      <div class="row">
        <div id="my_panel1" class="large-12 columns text-center">
          
       
            <div class="my_h1">One Tap Tech Support</div>
            <h3 class="subheader" style="color: white;">Find a tech-savvy person in your neighbourhood. A convenient and economical solution to all your tech issues.</h3>
            <a href="/map" class="button large expand" id="getHelpButton">Find Help</a>
      

        </div>
      </div>
    

    </div>

   
    <div id="section3" class="sections">

    </br></br>
      <div class="row text-center">
        <h2 class="section3_text text-center" id="mainSubHeading"> Why fixnation? </h2>

      </br></br>

      <div class="row">


      <div class="large-6 columns"><div class="row"><div class="large-12 columns">

        <img class="section3_icons" src="img/map.png">

        <h3 class="section3_text_b">One tap to tech support.</h3>

        <h4 class="section3_text">Get tech support from people in your community with just a click</h4>

      </div></div></div>

     

      <div class="large-6 columns"><div class="row"><div class="large-12 columns">

        <img class="section3_icons" src="img/trust.png">

        <h3 class="section3_text_b">Trustworthy and reliant</h3>

        <h4 class="section3_text">Review and feedback system to verify all our technicians</h4>

      </div></div></div>

    </div>

  </br></br>


    <div class="row">

   

      <div class="large-6 columns"><div class="row"><div class="large-12 columns">

        <img class="section3_icons" src="img/secure.png">

        <h3 class="section3_text_b">Standardized pricing</h3>

        <h4 class="section3_text">A fixed hourly price of $12 for all services provided</h4>

      </div></div></div>

   

      <div class="large-6 columns"><div class="row"><div class="large-12 columns">

        <img class="section3_icons" src="img/community.png">

        <h3 class="section3_text_b">Strengthen your community</h3>

        <h4 class="section3_text">Be a part of a shared economy to support your community</h4>

      </div></div></div>

    </div>



      </div>

      </br></br></br>




    <div class="footer">
     
        <div class="row">
            <div class="large-4 columns links text-center footerDiv">
				<div class="footerInnerDiv">
					<a href="/about">About</a> &nbsp&nbsp | &nbsp&nbsp 
					<a href="mailto:fixnation@fixnation.co?Subject=General%20contact" target="_top">Contact</a>
				</div>
            </div>

            <div class="large-4 columns social text-center footerDiv">
			<div class="footerInnerDiv" style="  margin-top: -15px;">
                <a href="https://www.facebook.com/fixnation" target="_blank"><i class="fi-social-facebook"></i></a>
                <a href="https://twitter.com/fixnationco" target="_blank"><i class="fi-social-twitter"></i></a>
                <a href="https://www.linkedin.com/company/fixnation-co/" target="_blank"><i class="fi-social-linkedin"></i></a>
               </div>
            </div>
            <div class="large-4 columns copyright text-center footerDiv">
			<div class="footerInnerDiv">
                2015 © fixnation
				</div>
            </div>
        </div>
      </br></br>
    </div>

    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <!-- <script src="js/blur.js"></script> -->
    <script src="js/landing_page.js"></script>
    <script>
      $(document).foundation();
      /*$('#beta_message').foundation('reveal', 'open').delay(1000);
      $('#close_beta_message').on('click', function() {
          $('#beta_message').foundation('reveal', 'close');
        });*/ 
    </script>
  </body>
</html>
