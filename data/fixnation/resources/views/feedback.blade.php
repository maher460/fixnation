<?php




    $email ='';
    $probdescription='';
   
    if(isset($data)){
      die();
      $email =$data['email'];
      $probdescription =$data['description'];
    }
?>
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
    <title>Fixnation | Feedback</title>
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
        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
        <script src='https://www.google.com/recaptcha/api.js?hl=en'></script>
        <script>
        function initialize(){
          var elem = document.getElementById("scrwidth");
          elem.value = window.screen.width;
          var elem = document.getElementById("scrheight");
          elem.value = window.screen.height;

          var submitbtn = document.getElementById('pagesubmit');
          //submitbtn.style.visibility="hidden";
        }
      </script>
		</head>
  <body onload="initialize()">
	<?$user = Auth::user();?>
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
          
          <h2 class="text-center">Feedback</h2>



          

        </br></br>
        <div class="row">
                    <div class="large-12 columns">
                    	<p>Something didn't work as expected on our website?</br>Let us know about it and we will fix it.</p>
                    </div>
        </div>
            {!! Form::open(array('url' => 'feedback/save', 'class' => 'form', 'data-abide'=>'','id'=>'testForm', 'novalidate'=> 'novalidate' )) !!}

                  <div class="row">
                    <div class="large-12 columns">
                    
                    <div class="row"> 
                        <div class="large-3 columns">
                          <label for="right-label" class="left inline">E-mail address:</label>
                        </div>
                        <div class="large-9 columns">
        					{!! Form::text('email', $email,
                            array('class'=>'form-control',
                                  'placeholder'=>'john.doe@yourname.com')) !!}
								  
                            
							
    					       </div>
                    </div>

                    <div class="row"> 
                        <div class="large-3 columns">
                          <label for="right-label" class="left inline">Problem description:</label>
                        </div>
                        <div class="large-9 columns">
                  {!! Form::textarea('probdescription', $probdescription,
                            array('class'=>'form-control',
                                  'placeholder'=>'your problem description')) !!}
                  
                            
              
                     </div>
                    </div>

                    <div class="row"> 
                        <div class="large-3 columns">
                          <label for="right-label" class="left inline">Your device:</label>
                        </div>
                        <div class="large-9 columns">

                        {!! Form::radio('device', 'computer', true, array('id' => "devcomputer") ) !!}<label onclick="document.getElementById('devcomputer').checked = true;">Computer</label>
                        {!! Form::radio('device', 'tablet', false, array('id' => "devtablet") ) !!}<label onclick="document.getElementById('devtablet').checked = true;">Tablet</label>
                        {!! Form::radio('device', 'phone' , false, array('id' => "devphone") ) !!}<label onclick="document.getElementById('devphone').checked = true;">Smartphone</label>
                            
              
                     </div>
                    </div>

                    <div class="row">
                        <hr>
                    </div>

                </div>
                
                </div>										  


	         <?php if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
              $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
              } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                  $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
              } else {
                  $ipaddress = $_SERVER['REMOTE_ADDR'];
              } ?>
			
            <input type="hidden" name="scrwidth" id="scrwidth">
            <input type="hidden" name="scrheight" id="scrheight">
			<input type="hidden" name="userip" id="userip" value=" <?php echo($ipaddress); ?>">
			<input type="hidden" name="userbrowser" id="userbrowser" value="<?php echo($_SERVER['HTTP_USER_AGENT']);?>">
			<?php
				$jsonip =  unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ipaddress));
        $locinfo_city=$jsonip['geoplugin_city'];
        $locinfo_region=$jsonip['geoplugin_region']; 
        $locinfo_country=$jsonip['geoplugin_countryName'];       
			?>
			<input type="hidden" name="userloc_city" id="userloc_city" value="<?php echo($locinfo_city);?>">
      <input type="hidden" name="userloc_region" id="userloc_region" value="<?php echo($locinfo_region);?>">
      <input type="hidden" name="userloc_country" id="userloc_country" value="<?php echo($locinfo_country);?>">
      <script>
        function submiton(){
          document.getElementById('pagesubmit').style.visibility="visible";
        }
      </script>
			<div class="row">
                <div class="large-6 columns large-centered text-centered">
					<div class="g-recaptcha" data-callback="submiton()" data-sitekey="6LfaDwoTAAAAAMch5cx0YT_VIRdQc7aStNwLire-"></div>
				</div>

			</div>
			
			<div class="form-group">
			</br>
				<button type="submit" id="pagesubmit" class="button medium expand green">Submit a feedback</button>
			
			</div>
						  
                      
                       
					
                    
                  </div>



                </form></br></br>
          

           

            

      

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
