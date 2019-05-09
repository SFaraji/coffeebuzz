<?php session_start();
include_once('tools.php');
styleCLink();

/**
 * Home page, 
 * display customer page when not logged in, 
 * 
 * provide fake ordering function as a customer need to be logged in to order, 
 * i.e: viewer can go through the ordering proccess and see the price in the end but can not order if they are not logged in.
 * 
 * when sighUp is clicked, redirect to signUp page
 * when login is clicked, redirect to login page
 * 
 * when logged in as admin, redirect to admin page
 * when logged in as staff, redirect to staff page
 * when logged in as customer, provide real ordering function
 * when order is clicked, send order info and customer info to server and redirect to paypal gateway
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
    <div><nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
    <div class="container"><a href="index.html" class="navbar-brand">coffeeBuzz</a><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
            id="navcol-1">
            <ul class="nav navbar-nav mr-auto"></ul><span class="navbar-text actions"><a class="btn btn-light action-button" href="login.html">Login</a></span></div>
    </div>
</nav></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 id="home-page-heading">Hello from coffeeBuzz</h1>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Espresso</h4>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Small</label></div><label id="qty"></label><a class="card-link" href="#">+</a><a class="card-link" href="#">-</a>
                            <h4
                                class="card-title">Double espresso</h4>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Small</label></div><label id="qty"></label><a class="card-link" href="#">+</a><a class="card-link" href="#">-</a></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Latte</h4>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Large</label></div><label id="qty"></label><a class="card-link" href="#">+</a><a class="card-link" href="#">-</a>
                            <h4
                                class="card-title">Cappuccino</h4>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Medium</label></div>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Large</label></div><label id="qty"></label><a class="card-link" href="#">+</a><a class="card-link" href="#">-</a></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Long black</h4>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Medium</label></div>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Large</label></div><label id="qty"></label><a class="card-link" href="#">+</a><a class="card-link" href="#">-</a>
                            <h4
                                class="card-title">Hot chocolate</h4>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Medium</label></div>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Large</label></div><label id="qty"></label><a class="card-link" href="#">+</a><a class="card-link" href="#">-</a></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tea</h4><select>
    <option value="" disabled selected>Choose from the 4 choices</option>
    <option value="12">Early Grey</option>
    <option value="13">Assam</option>
    <option value="14">Green</option>        
    <option value="15">Mint</option>
</select>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Medium</label></div>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Large</label></div><label id="qty"></label><a class="card-link" href="#">+</a><a class="card-link" href="#">-</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div></div>
    <div></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-4"><div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" id="sides-dropdown">Select Sides </button>
    <div role="menu" class="dropdown-menu"><a role="presentation" href="#" class="dropdown-item">Blueberry Cake</a><a role="presentation" href="#" class="dropdown-item">Banana Bread</a><a role="presentation" href="#" class="dropdown-item">Ham and Cheese Toastie</a></div>
</div><button class="btn btn-primary" type="button" id="order-btn">ORDER NOW</button></div>
            </div>
        </div>
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