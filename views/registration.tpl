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
            <a class="brand pull-left" href="/"><em><?php echo $site_title; ?></em></a>
            <?php
                    if (!isset($_COOKIE["username"])){
                      echo '<a class="brand-right" href="/login"><em>Login</em></a>';
            } else {
            echo '<a class="brand-right" href="/?logout=logout"><em>Welcome, '.$_COOKIE["username"].'</em></a>';
            };
            ?>
        </div><!--/.nav-collapse -->
    </div>
</div>
</div>  <!-- end of div for nav bar-->

<div class="container">
    <!-- <table class="table table-hover">
    <tr> -->
    <a href="/">NEC Server</a> / Registration
    <br>
    <div class="hero-unit">
        <form action="doregistration.php" method="POST">

            <table>
                <tr>
                    <td><p align="right">Username :</p></td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td><p align="right">Password :</p></td>
                    <td><input type="password" name="pw"></td>
                </tr>
                <tr>
                    <td><p align="right">Contact email :</p></td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td><p align="right">Shipping Address :</p></td>
                    <td><textarea rows="3" cols="20" name="shipping_address"> </textarea></td>
                </tr>
            </table>
            <input type="submit" value="Submit">
            <?php
                        if ($state == "regerror"){
                            echo ' <font color="red">Registration Fail.</font> ';
            }
            ?>
        </form>
    </div> <!-- end of the hero-unit-->
</div> <!-- end of the container-->

</body>
</html>
