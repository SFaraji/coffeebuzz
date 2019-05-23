<?php session_start();
include_once('tools.php');
styleCLink();

/**
 * Staff page
 * 
 * have no access to account database
 * have limited access to menu item database
 * i.e: can only mark a menu item as unavaliable,
 * can not add or remove menu item
 * 
 * have current order list <dev>
 * display the current order that need to be fullfilled 
 * each current order item have an order number and a discription
 * each current order item has two buttons, accept & raise issue
 * order can only be compelete after accepted
 * if an order item cannot be fullfilled due to the lacking of matirial,
 * the staff can click "raise issue" button to inform the customer in any time.
 * 
 */
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>coffeeBuzz</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
<div>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
      <div class="container"><a href="index.php" class="navbar-brand">coffeeBuzz</a><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse"
            id="navcol-1">
            <ul class="nav navbar-nav mr-auto"></ul><span class="navbar-text actions"><a class="btn btn-light action-button" href="index.php">Customer</a></span>
            <ul class="nav navbar-nav mr-auto"></ul><span class="navbar-text actions"><a class="btn btn-light action-button" href="orders.php">Orders</a></span>
            <ul class="nav navbar-nav mr-auto"></ul><span class="navbar-text actions"><a class="btn btn-light action-button" href="menu.php">Menu</a></span>
            <ul class="nav navbar-nav mr-auto"></ul><span class="navbar-text actions"><a class="btn btn-light action-button" href="login.php">Sign Out</a></span>
            </div>
        </div></span>
      </div>
    </nav>
</div>

<div class="container">
    <h2>Incoming Orders</h2>
</div>
<br>
<div class="container">
    <div class="col-md-4">
        <INPUT class="btn btn-primary" type="button" value="Order ID: 1 ~ Click to View ~" onClick="window.open('order1.php','windowname',' width=400,height=600')">
        <p>Time: 
        <?php 
        echo date('l jS \of F Y h:i:s A');
        ?>
        </p>
    </div>

    <div class="col-md-4">
    <INPUT class="btn btn-primary" type="button" value="Order ID: 2 ~ Click to View ~" onClick="window.open('order2.php','windowname',' width=400,height=600')">
        <p>Time: 
        <?php 
        echo date('l jS \of F Y h:i:s A');
        ?>
        </p>
    </div>
    <div class="col-md-4">
    <INPUT class="btn btn-primary" type="button" value="Order ID: 3 ~ Click to View ~" onClick="window.open('order3.php','windowname',' width=400,height=600')">
        <p>Time: 
        <?php 
        echo date('l jS \of F Y h:i:s A');
        ?>
        </p>
    </div>

    <div class="footer-basic">
        <footer>
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">About Us</a></li>
                <li class="list-inline-item"><a href="#">Contact Us</a></li>
                <li class="list-inline-item"><a href="#">Terms and Conditions</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                <li class="list-inline-item"><a href="#">Careers</a></li>
            </ul>
            <p class="copyright">coffeeBuzz © 2019</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>