
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
                if (!empty($basket)){
                    $grand_total=0;
                    foreach ($basket as $item){
                    $grand_total=$grand_total+($item->price*$item->quantity);
                    echo'<div class="thumbnail">
                        <div class="caption-full">
                            <h4 class="pull-right"> Price/item: '.number_format((float)$item->price, 2, ',', '').' €<br><br>
                            Sub-total: &nbsp; '.number_format((float)$item->price*$item->quantity, 2, ',', '').' €
                            <h4>'.$item->title.'</h4>
                            <br>
                            <div class="col-xs-2">
                                <label for="sel1">Quantity:</label>
                            </div>
                            <div class="col-xs-6">
                                <div class="row">
                                <div class="col-xs-4">
                                <form action="basket" method="post" class="navbar-form navbar-left" role="update_quantity">
                                    <select class="form-control" id="quantity_chg" name="quantity_chg">';
                                    for ($x = 0; $x <= 10; $x++) {
                                        if ($x==$item->quantity){
                                            echo '<option selected>'.$x.'</option>';
                                        }
                                        else {
                                            echo '<option>'.$x.'</option>';
                                        }
                                        
                                    }
                                  echo '</select>
                                  <input type="hidden" name="itemid_chg" value="'.$item->item_id.'">
                                  </div>
                                  <div class="col-xs-4">
                                    <span class="input-group-btn">
                                        <button class="btn btn-md" type="submit"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>&nbsp;Recalculate</button>
                                    </span>
                                </div>
                                </form>
                                </div>
                              
                            </div>
                            <br><br>
                        </div>
                    </div>';}

                    echo'<div class="thumbnail">
                        <div class="caption-full">
                            <h4 class="pull-right"> Grand total: '.number_format((float)$grand_total, 2, ',', '').' €<br>
                            
                                <a href="http://www.fixnation.co/eshop/order/confirm/"><button class="btn btn-md"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Proceed with order</button></a>
                            
                            </h4>
                            <p><br><br><br><br></p>
                        </div>
                    </div>';


                }
                else {
                    echo '<p>There are no items in your basket right now</p>';
                }
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
