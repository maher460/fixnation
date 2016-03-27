
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
                    <h1><small>Delete product "<?php echo $current_item->title; ?>" ?</small></h1>
                    <div class="caption-full">
                        <?php echo'<p class="text-danger">'.$change_error.'</p>'; ?>
                        <form action="http://www.fixnation.co/eshop/delete_item/<?php echo $current_item->ID; ?>/" method="post" role="add_cat">
                          <input type="hidden" name="action" value="proceed">
                          <?php
                                echo '<span class="input-group-btn">
                            <button class="btn btn-md" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Permanantly hide this product</button>
                        </span>';
                          ?>
                            
                          
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
