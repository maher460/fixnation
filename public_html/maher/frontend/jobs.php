<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fixnation | Jobs</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/jobs_page_style.css" />
    <link rel="Stylesheet" type="text/css" href="foundation-icons/foundation-icons.css" />
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script src="js/vendor/modernizr.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<style>div.stars {

  width: 270px;

  display: inline-block;

}

 


label.star {

  float: right;

  padding: 10px;

  font-size: 36px;

  color: #444;

  transition: all .2s;

}

 

input.star:checked ~ label.star:before {

  content: '\f005';

  color: #FD4;

  transition: all .25s;

}

 

input.star-5:checked ~ label.star:before {

  color: #FE7;

  text-shadow: 0 0 20px #952;

}

 

input.star-1:checked ~ label.star:before { color: #F62; }

 

label.star:hover { transform: rotate(-15deg) scale(1.3); }

 

label.star:before {

  content: '\f006';

  font-family: FontAwesome;

}</style>
							  
							  
  </head>
  <body>

   <div class="fixed">

  <nav class="top-bar" data-options="sticky_on: large">
    <ul class="title-area">
       
      <li class="name">
        
          <a href="/">
            <img id="button_logo" src="img/fixnation-logo-inverse.png">
          </a>
        
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
 
    <section class="top-bar-section">
       
      <ul class="left">
        
        

      </ul>
 
       
      <ul class="right">

        

        <li class="divider"></li>
        <li><a href="/map">Search and Find</a></li>

        <li class="divider"></li>
        <li><a href="/profile">Profile</a></li>

        <li class="divider"></li>
        <li><a href="/logout">Logout</a></li>

      </ul>
    </section>
  </nav>

</div>

<?


$user = Auth::user();

$pendingJobs=array();
$confirmedJobs=array();
$doneJobs=array();


foreach($gigs as $gig){
	if($gig->done || $gig->declined){
		$doneJobs[]=$gig;
	}
	elseif($gig->confirmed){
		$confirmedJobs[]=$gig;
	}
	else {
		$pendingJobs[]=$gig;
	}
}


?>


    
    <div id="section1" class="sections">

  
     <!--  <img class="section_bg" src="http://static.wallpedes.com/wallpaper/chip/chip-computer-wallpapers-desktop-backgrounds-id-technology-wallpaper-1920x1080-wallpapers-hd-for-mobile-free-download-windows-7-1366x768-iphone-photoshop-tutorial-android.jpg"> -->
   </br></br></br></br>
      <div class="row">
        <div id="my_panel1" class="large-12 columns panel">

        </br>

          <div class="row"><div class="large-12 columns"><h2>Jobs</h2></div></div>
        
        <div class="row">

          <ul class="accordion" data-accordion role="tablist">
            <li class="accordion-navigation">
              <a class="panel_headings" href="#panel1d" role="tab" id="panel1d-heading" aria-controls="panel1d">Upcoming</a>
			  
			  <?foreach($pendingJobs as $job){
				  
				  
				  ?>

              <div id="panel1d" class="content active" role="tabpanel" aria-labelledby="panel1d-heading">

                <div class="row panel callout">
                  <div class="large-1 columns">
                    <div class="row text-center"><h1>1</h1></div>
                    <div class="row">
					<?if($user->id == $job->provider){
						
						?>
                      <ul class="stack button-group">
                        <li><a href="jobs/accept/<?=$job->jobId?>" class="button tiny">Accept</a></li>
                        <li><a href="jobs/decline/<?=$job->jobId?>" class="button tiny">Decline</a></li>
                      </ul>
					<?}?>
                    </div>
                  </div>
                  <div class="large-11 columns">

                    <div class="row">
                      
                      <div class="small-4 columns"><i class="fi-marker"></i> &nbsp &nbsp <?=$job->street.' '.$job->street_number.' '.$job->city.' '.$job->state.' '.$job->country?></div>
                      <div class="small-4 columns"><i class="fi-telephone"></i> &nbsp &nbsp <?=$job->mobile?></div>
                    </div>

                    <div class="row"><div class="small-12 columns customer_name"><h2>&nbsp &nbsp&nbsp <?=$job->firstname.' '.$job->lastname;?></h2></div></div>
    
                    <div class="row"><div class="small-12 columns"><i class="fi-pencil"></i> &nbsp &nbsp <?=$job->description?></div></div>
                    
                  </div>

                </div>

			  <?}?>

              </div>
            </li>
            <li class="accordion-navigation">
              <a href="#panel2d"  role="tab" id="panel2d-heading" aria-controls="panel2d">Pending</a>
              <div id="panel2d" class="content" role="tabpanel" aria-labelledby="panel2d-heading">
                
                <?foreach($confirmedJobs as $job){
				  
				  
				  ?>

              <div id="panel1d" class="content active" role="tabpanel" aria-labelledby="panel1d-heading">

                <div class="row panel callout">
                  <div class="large-1 columns">
                    <div class="row text-center"><h1>1</h1></div>
                    <div class="row">
					<?if($user->id == $job->customer){
						
						?>
                      <ul class="stack button-group">
                        <li>
						
						
						
						
						
						<a href="#" data-reveal-id="myModal" class="button tiny" >Completed</a>
							<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
							  
							  {!! Form::open(array('url' => 'jobs/complete', 'class' => 'form')) !!}
							  
							  
							  
							  
							  <div class="stars">

								

									<input class="star star-5" id="star-5" type="radio" name="star"  value="5" />

									<label class="star star-5" for="star-5"></label>

									<input class="star star-4" id="star-4" type="radio" name="star" value="4" />

									<label class="star star-4" for="star-4"></label>

									<input class="star star-3" id="star-3" type="radio" name="star" value="3" />

									<label class="star star-3" for="star-3"></label>

									<input class="star star-2" id="star-2" type="radio" name="star" value="2" />

									<label class="star star-2" for="star-2"></label>

									<input class="star star-1" id="star-1" type="radio" name="star" value="1" />

									<label class="star star-1" for="star-1"></label>

								  
								</div>

								
							<input name="job" type="hidden" value="<?=$job->jobId?>">
							<input name="provider" type="hidden" value="<?=$job->provider?>">
								
								{!! Form::submit('Job done!',
							  array('class'=>'btn btn-primary')) !!}
					  
								{!! Form::close() !!}
							  
							  
							  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
							</div>
						
						
						
						</li>                        
                      </ul>
					<?}?>
                    </div>
                  </div>
                  <div class="large-11 columns">

                    <div class="row">
                      
                      <div class="small-4 columns"><i class="fi-marker"></i> &nbsp &nbsp <?=$job->street.' '.$job->street_number.' '.$job->city.' '.$job->state.' '.$job->country?></div>
                      <div class="small-4 columns"><i class="fi-telephone"></i> &nbsp &nbsp <?=$job->mobile?></div>
               

                    <div class="row"><div class="small-12 columns customer_name"><h2>&nbsp &nbsp&nbsp <?=$job->firstname.' '.$job->lastname;?></h2></div></div>
    
                    <div class="row"><div class="small-12 columns"><i class="fi-pencil"></i> &nbsp &nbsp <?=$job->description?></div></div>
                    
                  </div>

                </div>

			  <?}?>
				
				

                </div>

              
            </li>
            <li class="accordion-navigation">
              <a href="#panel3d" role="tab" id="panel3d-heading" aria-controls="panel3d">Completed</a>
              <div id="panel3d" class="content" role="tabpanel" aria-labelledby="panel3d-heading">
                
				<?foreach($doneJobs as $job){
				  
				  
				  ?>

              <div id="panel1d" class="content active" role="tabpanel" aria-labelledby="panel1d-heading">

                <div class="row panel callout">
                  <div class="large-1 columns">
                    <div class="row text-center"><h1>1</h1></div>
                    <div class="row">
					
                    </div>
                  </div>
                  <div class="large-11 columns">

                    <div class="row">
                      
                      <div class="small-4 columns"><i class="fi-marker"></i> &nbsp &nbsp <?=$job->street.' '.$job->street_number.' '.$job->city.' '.$job->state.' '.$job->country?></div>
                      <div class="small-4 columns"><i class="fi-telephone"></i> &nbsp &nbsp <?=$job->mobile?></div>
                    </div>

                    <div class="row"><div class="small-12 columns customer_name"><h2>&nbsp &nbsp&nbsp <?=$job->firstname.' '.$job->lastname;?></h2></div></div>
    
                    <div class="row"><div class="small-12 columns"><i class="fi-pencil"></i> &nbsp &nbsp <?=$job->description?></div></div>
                    
                  </div>

                </div>

			  <?}?>
				
				
				
				
				
              </div>
            </li>
          </ul>

        </div>
       
      </div>
    </br></br></br></br></br></br></br>

    </div>


    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
