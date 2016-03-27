<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="http://www.ficnation.co/eshop/favicon.ico" />
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GroceryGuru</title>
    <link href="<?php echo asset_url();?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>css/shop-homepage.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://www.fixnation.co/eshop/"><img src="<?php echo asset_url();?>img/groceryguru.png" height="60px"></a>
            </div>
<!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <div class="dropdown">
                          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <?php echo $username; ?>
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="<?php echo base_url();?>order/list/">My orders</a></li>
                            <li><a href="<?php echo base_url();?>profile">My profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url();?>logout">Sign out</a></li>
                          </ul>
                          <?php
                            if ($basketcount==0){
                                $basketbadge='';
                            }
                            else {
                                $basketbadge='<span class="badge">'.$basketcount;
                            }
                          ?>
                          <a href="<?php echo base_url();?>basket"><button class="btn btn-success" type="button"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;Basket&nbsp;<?php echo $basketbadge; ?></span></button></a>
                        </div>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->