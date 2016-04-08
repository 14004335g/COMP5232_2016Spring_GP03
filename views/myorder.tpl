<!DOCTYPE html>
<html>
<head>
    <title><?php echo $site_title; ?> </title>
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

        .preview {
            float: left;
            margin-right: 20px;
        }

        .preview .thumb {
            border: 0 none;
            margin-top: 5px;
            width: 252px;
        }

        .outofstock {
            background-color: red;
            pointer-events: none;
            cursor: default;
        }

        a.outofstock {
            color: white;
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
    <div class="hero-unit">
        <div>
            <table width="100%">
                <tr>
                    <th>Order id</th>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Remark</th>
                </tr>

                <?php
				foreach($orders as $order) {

                echo '
                <tr>
                    <td align="center">'.$order -> ID.'</td>
                    <td align="center">'.$order -> STOCK_NAME.'</td>
                    <td align="center">'.$order -> QUANTITY.'</td>
                    <td align="center">'.$order -> REMARK.'</td>
                </tr>
                '; ?>


                <?php

				}
			 ?>
            </table>
        </div>
        <p style="clear:both"></p>


    </div> <!-- end of the hero-unit-->
</div> <!-- end of the container-->

</body>
</html>
