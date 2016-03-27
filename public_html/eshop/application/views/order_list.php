
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
                if ($view_mode=='list'){
                    if ($is_admin==1){
                                echo '<div class="row">
                                    <a href="http://www.fixnation.co/eshop/edit_orders/"><button class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Edit statuses of orders</button></a>
                                    </div><br><br>';
                            }
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
                            echo '<h4 class="pull-right"> Total: '.number_format((float)$grand_total, 2, ',', '').' €</h4>';
                            echo '<br><br>';
                            echo '<p>Created: '.date("j.n.Y H:i:s",strtotime($order->ordered)).'</p>';
                            if (!empty($order->dispatched)){
                                echo '<p>Dispatched: '.date("j.n.Y H:i:s",strtotime($order->dispatched)).'</p>';
                            }
                            if (!empty($order->completed)){
                                echo '<p>Completed: '.date("j.n.Y H:i:s",strtotime($order->completed)).'</p>';
                            }
                        echo'</div>
                    </div>';}


                }
                else {
                    echo '<p>You have not made any orders so far</p>';
                }
            }
            else if ($view_mode=='confirm'){
                foreach ($basket as $item){
                    $grand_total=0;
                    $grand_total=$grand_total+($item->price*$item->quantity);
                    echo'<div class="thumbnail">
                        <div class="caption-full">
                            <h4 class="pull-right"> Price/item: '.number_format((float)$item->price, 2, ',', '').' €<br><br>
                            Sub-total: &nbsp; '.number_format((float)$item->price*$item->quantity, 2, ',', '').' €</h4>
                            <h3><a href="http://www.fixnation.co/eshop/item/'.$item->item_id.'/">'.$item->title.'</a></h3>
                            <br>
                            <h4>Quantity: '.$item->quantity.'</h4>
                        </div>
                    </div>';
                }
                echo '<br>
                <h4>Invoice will contain this information (<a href="http://www.fixnation.co/eshop/profile/">edit</a>):</h4>
                <p><b>Name: </b>'.$user->first_name.' '.$user->last_name.'</p>
                <p><b>Address: </b>'.$user->street.', '.$user->zip.' '.$user->city.', '.$country->country.'</p>
                <p><b>E-mail: </b>'.$user->email.'</p>
                <br><h4 class="pull-right"> Grand total: '.number_format((float)$grand_total, 2, ',', '').' €<br>
                            
                                <a href="http://www.fixnation.co/eshop/order/place/"><button class="btn btn-md"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Solemnly place the order</button></a>
                            
                            </h4>';
            }
            else if ($view_mode=='place'){
                echo'<h4><a href="http://www.fixnation.co/eshop/">Return to home screen</a></h4>';
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
