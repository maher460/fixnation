
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
                    echo '<h1><small>'.$subtitle.'</small></h1>';} ?>
            <?php
                if (!empty($orders)){
                    foreach ($orders as $order){
                    echo'<div class="thumbnail">
                        <div class="caption-full">
                            <h2>Order #'.$order->ID.'</h2>
                            <br>';
                            $grand_total=0;
                            foreach ($orderitems as $item){
                                if ($item->ID==$order->ID){
                                    echo '<p>'.$item->quantity.' X <a href="http://www.fixnation.co/eshop/items/'.$item->itemid.'">'.$item->title.'</a>&nbsp;&nbsp;á '.number_format((float)$item->price, 2, ',', '').' € &nbsp;&nbsp;=>&nbsp;'.number_format((float)$item->price*$item->quantity, 2, ',', '').' €</p>';    
                                    $grand_total=$grand_total+($item->price*$item->quantity);
                                }
                            }
                            echo'<br>';
                            echo'<p><b>Customer name (ID #'.$order->user_id.'):</b> '.$order->first_name.' '.$order->last_name.'</p>';
                            echo'<p><b>Address:</b> '.$order->street.', '.$order->zip.' '.$order->city.', '.$order->country.'</p>';
                            echo'<p><b>E-mail:</b> '.$order->email.'</p>';
                            echo '<h4 class="pull-right"> Total: '.number_format((float)$grand_total, 2, ',', '').' €</h4>';
                            echo '<br><br>';
                            echo '<p>Created: '.date("j.n.Y H:i:s",strtotime($order->ordered)).'</p>';
                            if (!empty($order->dispatched)){
                                echo '<p>Dispatched: '.date("j.n.Y H:i:s",strtotime($order->dispatched)).'</p>';
                            }
                            else {
                                echo'<form action="http://www.fixnation.co/eshop/edit_orders/" method="post" role="add_profile">
                                        <div class="form-group">
                                            <input type="hidden" name="action" value="dispatch">
                                            <input type="hidden" name="orderid" value="'.$order->ID.'">
                                            <span class="input-group-btn">
                                                <button class="btn btn-md btn-warning" type="submit"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>&nbsp;Dispatch</button>
                                            </span>
                                        </div>
                                    </form>';

                            }
                            if (!empty($order->completed)){
                                echo '<p>Completed: '.date("j.n.Y H:i:s",strtotime($order->completed)).'</p>';
                            }
                            else if (!empty($order->dispatched)) {
                                echo'<form action="http://www.fixnation.co/eshop/edit_orders/" method="post" role="add_profile">
                                        <div class="form-group">
                                            <input type="hidden" name="action" value="complete">
                                            <input type="hidden" name="orderid" value="'.$order->ID.'">
                                            <span class="input-group-btn">
                                                <button class="btn btn-md btn-success" type="submit"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>&nbsp;Complete</button>
                                            </span>
                                        </div>
                                    </form>';

                            }
                        echo'</div>
                    </div>';}


                }
                else {
                    echo '<p>There are no orders</p>';
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
