
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-4">
            	
            </div>

            <div class="col-md-8">
            <?php
                if (!empty($subtitle)){
                    echo '<h1><small>'.$subtitle.'</small></h1>';}
                echo'<p class="text-danger">'.$change_error.'</p><div class="thumbnail">
                    <div class="caption-full">
                        <form action="http://www.fixnation.co/eshop/registration/proceed/" method="post" role="add_profile">
                          <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input class="form-control" id="email" type="email" name="email" '; if ($i_email){echo'value="'.$i_email.'"';} echo'>
                          </div>
                          <div class="form-group">
                            <label for="new_password">Password:</label>
                            <input class="form-control" id="new_password" type="password" name="new_password" '; if ($i_new_password){echo'value="'.$i_new_password.'"';} echo'>
                          </div>
                          <div class="form-group">
                            <label for="new_password2">Repeat password:</label>
                            <input class="form-control" id="new_password2" type="password" name="new_password2" '; if ($i_new_password2){echo'value="'.$i_new_password2.'"';} echo'>
                          </div>
                          <div class="form-group">
                            <label for="first_name">First name:</label>
                            <input class="form-control" id="first_name" type="text" name="first_name" '; if ($i_first_name){echo'value="'.$i_first_name.'"';} echo'>
                          </div>
                          <div class="form-group">
                            <label for="last_name">Last name:</label>
                            <input class="form-control" id="last_name" type="text" name="last_name" '; if ($i_last_name){echo'value="'.$i_last_name.'"';} echo'>
                          </div>
                          <div class="form-group">
                            <label for="street">Sreet and house number:</label>
                            <input class="form-control" id="street" type="text" name="street" '; if ($i_street){echo'value="'.$i_street.'"';} echo'>
                          </div>
                          <div class="form-group">
                            <label for="city">City:</label>
                            <input class="form-control" id="city" type="text" name="city" '; if ($i_city){echo'value="'.$i_city.'"';} echo'>
                          </div>
                          <div class="form-group">
                            <label for="zip">Postal code:</label>
                            <input class="form-control" id="zip" type="text" name="zip" '; if ($i_zip){echo'value="'.$i_zip.'"';} echo'>
                          </div>
                          <div class="form-group">
                            <label for="country">Country:</label>
                            <select class="form-control" id="country" name="country">';
                            foreach ($countries as $country) {
                                    if (($i_country) and ($i_country==$country->ID)){
                                        echo '<option selected value="'.$country->ID.'">'.$country->country.'</option>';    
                                    }
                                    else {
                                        echo '<option value="'.$country->ID.'">'.$country->country.'</option>';
                                    }
                                }
                              echo '</select>
                            </div>
                            <div class="form-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-md" type="submit"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>&nbsp;Sign up</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>';
            ?>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <a href="http://www.tomesaros.valec.net" target="_blank">Tomáš Mesároš</a> 2015-2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo asset_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo asset_url();?>js/bootstrap.min.js"></script>

</body>

</html>
