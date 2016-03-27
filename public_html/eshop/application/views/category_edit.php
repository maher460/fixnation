
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-4">
            </div>

            <div class="col-md-8">
                <div class="thumbnail">
                    <h1><small>Add a new category</small></h1>
                    <div class="caption-full">
                        <?php echo'<p class="text-danger">'.$change_error.'</p>'; ?>
                        <form action="http://www.fixnation.co/eshop/edit_cat/<?php echo $current_cat->ID; ?>/" method="post" role="add_cat">
                          <div class="form-group">
                            <label for="title">Category name:</label>
                            <input class="form-control" id="title" type="text" name="title" value="<?php echo $current_cat->name;?>">
                          </div>
                          <div class="form-group">
                            <label for="category">This category is child of:</label>
                            <select class="form-control" id="category" name="category">';
                                <?php 
                                    if ($current_cat->super_cat==''){
                                        echo '<option value="NULL" selected>No category - topmost level</option>';
                                    }
                                    else {
                                        echo '<option value="NULL">No category - topmost level</option>';
                                    } 
                                ?>
                                
                            <?php foreach ($categories as $category) {
                                    if ($current_cat->super_cat==$category->ID){
                                        echo '<option selected value="'.$category->ID.'">'.$category->name.'</option>';
                                    }
                                    else {
                                        echo '<option value="'.$category->ID.'">'.$category->name.'</option>';
                                    }
                                }?>
                            </select>
                            </div>
                            <input type="hidden" name="action" value="proceed">
                          <span class="input-group-btn">
                            <button class="btn btn-md" type="submit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Edit category</button>
                        </span>
                        </form>
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
