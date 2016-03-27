<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fixnation | Login</title>


      {{!! HTML::style('css/foundation.css'); !!}}
      {{!! HTML::style('css/landing_page_style.css'); !!}}
      {{!! HTML::script('js/vendor/modernizr.js'); !!}}

  </head>
  <body>

   <div class="fixed">

  <nav class="top-bar" data-options="sticky_on: large">
    <ul class="title-area">
       
      <li class="name">
        
          <a href="index.html">
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
        <li><a href="#">Search and Find</a></li>

        <li class="divider"></li>
        <li><a href="#">Profile</a></li>

        <li class="divider"></li>
        <li><a href="#">Logout</a></li>

      </ul>
    </section>
  </nav>

</div>


    
    <div id="section1" class="sections">

  
     <!--  <img class="section_bg" src="http://static.wallpedes.com/wallpaper/chip/chip-computer-wallpapers-desktop-backgrounds-id-technology-wallpaper-1920x1080-wallpapers-hd-for-mobile-free-download-windows-7-1366x768-iphone-photoshop-tutorial-android.jpg"> -->
   </br></br></br></br></br></br></br></br></br></br></br></br>
      <div class="row">
        <div id="my_panel1" class="large-12 columns panel text-center">
          
          <h2 class="text-center">Login</h2>

        </br></br>
       
            <form>
              <div class="row">
                <div class="large-12 columns">
                  <label>Input Label
                    <input type="text" placeholder="large-12.columns" />
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="large-4 columns">
                  <label>Input Label
                    <input type="text" placeholder="large-4.columns" />
                  </label>
                </div>
                <div class="large-4 columns">
                  <label>Input Label
                    <input type="text" placeholder="large-4.columns" />
                  </label>
                </div>
                <div class="large-4 columns">
                  <div class="row collapse">
                    <label>Input Label</label>
                    <div class="small-9 columns">
                      <input type="text" placeholder="small-9.columns" />
                    </div>
                    <div class="small-3 columns">
                      <span class="postfix">.com</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="large-12 columns">
                  <label>Select Box
                    <select>
                      <option value="husker">Husker</option>
                      <option value="starbuck">Starbuck</option>
                      <option value="hotdog">Hot Dog</option>
                      <option value="apollo">Apollo</option>
                    </select>
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="large-6 columns">
                  <label>Choose Your Favorite</label>
                  <input type="radio" name="pokemon" value="Red" id="pokemonRed"><label for="pokemonRed">Red</label>
                  <input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Blue</label>
                </div>
                <div class="large-6 columns">
                  <label>Check these out</label>
                  <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
                  <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
                </div>
              </div>
              <div class="row">
                <div class="large-12 columns">
                  <label>Textarea Label
                    <textarea placeholder="small-12.columns"></textarea>
                  </label>
                </div>
              </div>
            </form>

          </br></br>

            <a href="#" class="button expand">Submit</a>

      

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
