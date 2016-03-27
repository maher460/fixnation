
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
                echo'<div class="thumbnail">
                    <div class="caption-full">
                        <form action="profile" method="post" role="update_profile">
                          <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input class="form-control" id="email" type="text" readonly="readonly" name="email" value="'.$user->email.'">
                          </div>
                          <div class="form-group">
                            <label for="first_name">First name:</label>
                            <input class="form-control" id="first_name" type="text" name="first_name" value="'.$user->first_name.'">
                          </div>
                          <div class="form-group">
                            <label for="last_name">Last name:</label>
                            <input class="form-control" id="last_name" type="text" name="last_name" value="'.$user->last_name.'">
                          </div>
                          <div class="form-group">
                            <label for="street">Sreet and house number:</label>
                            <input class="form-control" id="street" type="text" name="street" value="'.$user->street.'">
                          </div>
                          <div class="form-group">
                            <label for="city">City:</label>
                            <input class="form-control" id="city" type="text" name="city" value="'.$user->city.'">
                          </div>
                          <div class="form-group">
                            <label for="zip">Postal code:</label>
                            <input class="form-control" id="zip" type="text" name="zip" value="'.$user->zip.'">
                          </div>
                          <div class="form-group">
                            <label for="country">Country:</label>
                            <select class="form-control" id="country" name="country">';
                            foreach ($countries as $country) {
                                if ($user->country_id==$country->ID){
                                    echo '<option selected value="'.$country->ID.'">'.$country->country.'</option>';    
                                }
                                else {
                                    echo '<option value="'.$country->ID.'">'.$country->country.'</option>';
                                }
                                }
                              echo '</select>
                            </div>
                            <input type="hidden" name="action_name" value="change_profile">
                            <div class="form-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-md" type="submit"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>&nbsp;Save changes</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>';
            ?>
            <?php
                echo'<div class="thumbnail">
                    <div class="caption-full">
                        <p class="text-danger">'.$change_error.'</p>
                        <form action="profile" method="post" role="update_password">
                          <div class="form-group">
                            <label for="old_password">Current password:</label>
                            <input class="form-control" id="old_password" type="password" name="old_password" value="">
                          </div>
                          <div class="form-group">
                            <label for="new_password">New password:</label>
                            <input class="form-control" id="new_password" type="password" name="new_password" value="">
                          </div>
                          <div class="form-group">
                            <label for="new_password2">Repeat new password:</label>
                            <input class="form-control" id="new_password2" type="password" name="new_password2" value="">
                          </div>
                            <input type="hidden" name="action_name" value="change_password">
                            <div class="form-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-md" type="submit"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>&nbsp;Change password</button>
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
