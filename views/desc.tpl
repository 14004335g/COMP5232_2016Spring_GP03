<!DOCTYPE html>
<html>
<head>
    <title> <?php echo $site_title; ?> </title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/static/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/static/bootstrap-responsive.css" rel="stylesheet">
    <link href="/static/bootstrap.css" rel="stylesheet">
    <link href="/static/NEC.css" rel="stylesheet">

    <style type="text/css">
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */

        }

        /* Custom container */
        .container-narrow {
            margin: 0 auto;
            max-width: 900px;
            border-style: solid;
            border-color: transparent;
            background-color: #D8D8D8;
            z-index: 9;
            height: 100%;
            -moz-border-radius: 15px;
            border-radius: 15px;

        }

        .container-narrow > hr {
            margin: 30px 0;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }

    </style>

</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">

            <a class="brand pull-left" href="/"><em><b><?php echo $site_title; ?></b></em></a>
            <?php
                    if (!isset($_COOKIE["username"])){
                      echo '<a class="brand-right" href="/login"><em>Login</em></a>';
            } else {
            echo '<a class="brand-right" href="/myorder"><em>My Order</em></a>';
            echo '<a class="brand-right"> | </em></a>';
            echo '<a class="brand-right" href="/?logout=logout"><em>Welcome, '.$_COOKIE["username"].'</em></a>';
            echo ' ';
            };
            ?>
            <div class="nav-collapse collapse">

            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>  <!-- end of div for nav bar-->

<div class="container">
    <!-- <table class="table table-hover">
    <tr> -->
    <a href="/">NEC Server</a> / <?php echo $item->TITLE ?>
    <div class="hero-unit">
        <div>
            <h2><em><?php echo $item->TITLE ?></em>
                <h2>
        </div>
        <br/>

        <img src="/static/images/<?php echo $item->IMGSRC ?>" class="sale-photo">

        <h3>
            Description:
        </h3>

        <div id="description">
            <?php echo $item->DESCRIPTION ?>
        </div>

        <h3>
            Price:
        </h3>

        <div id="price"><?php echo $item->PRICE ?></div>

        <?php
        if (isset($_COOKIE["username"])){
            echo '<h3>Make an order:</h3>
        <form action="doorder.php" method="POST">
            <table>
                <tr>
                    <td><p align="right">Quantity :</p></td>
                    <td><input type="number" name="quantity" min="1" max="5"></td>
                    <input type="hidden" name="itemid" value='.$item->ID.'></tr>
                <tr>
                    <td><p align="right">Remarks :</p></td>
                    <td><input type="text" name="remark"></td>
                </tr>
            </table>
            <input type="submit" value="Submit"></form>
        ';
        }
        ?>

        <?php
                        if ($state == "quanfail"){
                            echo ' <font color="red">Not enough stock</font> ';
        }
        ?>

    </div> <!-- end of the hero-unit-->
</div> <!-- end of the container-->

</body>
</html>
