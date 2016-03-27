
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-4">
            	<div class="row">
            		<div class="col-md-10">
            		<?php
            			if ($is_admin==1){
		                        echo '<div class="row">
		                            <a href="http://www.fixnation.co/eshop/add_item/"><button class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Add a new product</button></a>
		                            </div><br><br>';
		                    }
            		?>
            			<div class="input-group">
            				<form action="http://www.fixnation.co/eshop/category" method="post" class="navbar-form navbar-left" role="search">
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
							if ($is_admin==1){
		                        echo '<div class="row">
		                            <a href="http://www.fixnation.co/eshop/edit_cat/'.$current_cat->ID.'/"><button class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Edit category '.$current_cat->name.'</button></a>
		                            <a href="http://www.fixnation.co/eshop/delete_cat/'.$current_cat->ID.'/"><button class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Delete category '.$current_cat->name.'</button></a>
		                            <a href="http://www.fixnation.co/eshop/add_cat/"><button class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Add a new category</button></a>
		                            </div><br><br>';
		                    }
						}
						else {
							echo '<p class="lead">Product categories:</p>';
							if ($is_admin==1){
		                        echo '<div class="row">
		                            <a href="http://www.fixnation.co/eshop/add_cat/"><button class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Add a new category</button></a>
		                            </div><br><br>';
		                    }
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

                <div class="row">
                <?php 
                if (!empty($subtitle)){
                	echo '<h1><small>'.$subtitle.'</small></h1>';} ?>
                <?php
                if (!empty($items)){
	                	foreach ($items as $item) {
	                		if (file_exists('/www/f/i/u75267/public_html/eshop/assets/img/items/'.$item->ID.'.jpg')){
	                			$item_image=asset_url().'img/items/'.$item->ID.'.jpg';
	                		}
	                		else {
	                			$item_image='http://placehold.it/320x320';
	                			//$item_image=asset_url().'img/items/'.$item->ID.'.jpg';
	                		}
            				echo '<div class="col-sm-4 col-lg-4 col-md-4">
            				<div class="thumbnail">
                            <img src="'.$item_image.'" width="320px" height="320px" alt="'.$item->title.'">
                            <div class="caption">
                                <h4 class="pull-right">'.number_format((float)$item->price, 2, ',', '').' €</h4>
                                <h4><a href="http://www.fixnation.co/eshop/item/'.$item->ID.'/">'.$item->title.'</a></h4>
                            </div>
                        </div>
                    </div>';
                }
            }
            else {
            	echo ('No products to be shown');
            }?>

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
