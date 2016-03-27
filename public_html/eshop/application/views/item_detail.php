
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-4">
            	<div class="row">
            		<div class="col-md-10">
            			<div class="input-group">
            				<form action="category" method="post" class="navbar-form navbar-left" role="search">
					        	<input type="text" class="form-control input-md" placeholder="Search for a product" id="searchinput" name="searchinput">
					      		<span class="input-group-btn">
					        		<button class="btn btn-md" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
				      			</span>
				      		</form>
				    	</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<?php
						if ($menu_back==1){
							echo '<p class="lead">'.$current_cat->name.':</p>';
						}
						else {
							echo '<p class="lead">Product categories:</p>';
						}
						?>
		                <div class="list-group">
		                	<?php
		                	if ($menu_back==1){
		                		if (!empty($menu_back_cat->ID)){
		                			echo '<a href="http://www.fixnation.co/eshop/category/'.$menu_back_cat->ID.'" class="list-group-item active"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back to '.$menu_back_cat->name.'</a>';
		                		}
		                		else {
		                			echo '<a href="http://www.fixnation.co/eshop/category/" class="list-group-item active"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back to Home</a>';
		                		}
		                	}
		                	if (!empty($categories)){
			                	foreach ($categories as $object) {
									echo '<a href="http://www.fixnation.co/eshop/category/'.$object->ID.'/" class="list-group-item">'.$object->name.'</a>';
								}
							}
							else {echo '<br>No sub-categories';}
							?>
		                </div>
		            </div>
	            </div>
            </div>

            <div class="col-md-8">
                <?php
                    if ($is_admin==1){
                        echo '<div class="pull-right">
                            <a href="http://www.fixnation.co/eshop/edit_item/'.$item->ID.'/"><button class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Edit this product</button></a>
                            <a href="http://www.fixnation.co/eshop/delete_item/'.$item->ID.'/"><button class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Delete this product</button></a>
                            </div><br><br>';
                    }
                ?>
                <div class="thumbnail">
                    <?php
                    if (file_exists('/www/f/i/u75267/public_html/eshop/assets/img/items/'.$item->ID.'.jpg')){
                                $item_image=asset_url().'img/items/'.$item->ID.'.jpg';
                            }
                            else {
                                $item_image='http://placehold.it/320x320';
                                //$item_image=asset_url().'img/items/'.$item->ID.'.jpg';
                            }
                    
                    echo'<img class="img-responsive" src="'.$item_image.'" alt="'.$item->title.'" height="800px" width="800px">';?>
                    <div class="caption-full">
                        <h4 class="pull-right"><?php echo number_format((float)$item->price, 2, ',', ''); ?> €<br><br>
                        <?php
                            if (!empty($username)){
                                echo '<form action="http://www.fixnation.co/eshop/basket" method="post" class="navbar-form navbar-left" role="add_itembasket">
                                        <input type="hidden" name="itemid_add" value="'.$item->ID.'">
                                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;Add to basket</button>
                                    </form></h4>';
                            }
                            else {
                                echo '<button class="btn btn-default disabled" type="button" title="You need to sign in to continue"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;Add to basket</button></h4>';
                            }
                        ?>
                        <h4><?php echo $item->title ?></h4><br>
                        <p><br><br></p>
                        <p><?php echo $item->description ?></p>
                    </div>
                </div>

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
