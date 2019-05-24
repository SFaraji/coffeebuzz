<?php session_start();
include_once('tools.php');
styleCLink();

/**
 * Universal Login page,
 * 
 * not only for customer, also for staff and admin
 * 
 * has two text feild the username and password
 * has javascript to check if input is valid
 * 
 * if input is valid && login button is clicked, 
 * hash the password and send to server with username
 * 
 * when logged in as admin, redirect to admin page
 * when logged in as staff, redirect to staff page
 * when logged in as customer, redirect to index page
 * 
 */
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>coffeeBuzz | Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
<div>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
      <div class="container"><a href="index.php" class="navbar-brand">coffeeBuzz</a><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav mr-auto"></ul>
        <span class="navbar-text actions">
        <a class="btn btn-light action-button" href="orders.php" style="border-radius: 5px">Login</a></span></div>
      </div>
    </nav>
    </div>
    <h1 id="home-page-heading">Access to Portal</h1>
    <div class="login-clean">
        <form method="post">
            <h1>STAFF ACCESS</h1>
            <div class="illustration"></div>
            <div class="form-group"><input type="text" name="unique identifier" placeholder="Unique Identifier" class="form-control" /></div>
            <div class="form-group"><button class="btn btn-primary btn-block" onclick="window.location.href='orders.php'" >Log In</button></div><a href="orders.php" class="forgot">Forgot your email or password?</a></form>
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
