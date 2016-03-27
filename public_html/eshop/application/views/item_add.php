
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
                    <h1><small>Add a new product</small></h1>
                    <div class="caption-full">
                        <?php echo'<p class="text-danger">'.$change_error.'</p>'; ?>
                        <form action="http://www.fixnation.co/eshop/add_item/" method="post" role="add_item">
                          <div class="form-group">
                            <label for="title">Title:</label>
                            <input class="form-control" id="title" type="text" name="title">
                          </div>
                          <div class="form-group">
                            <label for="description">Description:</label>
                            <input class="form-control" id="description" type="text" name="description">
                          </div>
                          <div class="form-group">
                            <label for="price">Price per unit (use dot as a decimal separator):</label>
                            <input class="form-control" id="price" type="number" step="0.01" name="price">
                          </div>
                          <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category">';
                            <?php foreach ($categories as $category) {
                                    echo '<option value="'.$category->ID.'">'.$category->name.'</option>';
                                }?>
                            </select>
                            </div>
                            <input type="hidden" name="action" value="proceed">
                          <span class="input-group-btn">
                            <button class="btn btn-md" type="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Add item</button>
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
