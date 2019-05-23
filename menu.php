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
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav mr-auto"></ul>
        <span class="navbar-text actions">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
            </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="menu.php">Staff Menu</a>
                    <a class="dropdown-item" href="barista.php">Requests</a>
                    <a class="dropdown-item" href="#" aria-disabled="true">Settings</a>
                    <a class="dropdown-item" href="#" aria-disabled="true">Profile</a>
                </div>
        </div></span>
      </div>
    </nav>
</div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 id="home-page-heading">Staff Menu Page</h1>
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
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Small</label></div><label id="qty"></label><a class="card-link" href="#">Mark as Sold Out</a>
                            <h4
                                class="card-title">Double espresso</h4>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Small</label></div><label id="qty"></label><a class="card-link" href="#">Mark as Sold Out</a></div>
                                
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Latte</h4>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Large</label></div><label id="qty"></label><a class="card-link" href="#">Mark as Sold Out</a>
                            <h4
                                class="card-title">Cappuccino</h4>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Medium</label></div>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Large</label></div><label id="qty"></label><a class="card-link" href="#">Mark as Sold Out</a></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Long black</h4>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Medium</label></div>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Large</label></div><label id="qty"></label><a class="card-link" href="#">Mark as Sold Out</a>
                            <h4
                                class="card-title">Hot chocolate</h4>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Medium</label></div>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Large</label></div><label id="qty"></label><a class="card-link" href="#">Mark as Sold Out</a></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tea</h4><select>
    <option value="" disabled selected>Tea choices</option>
    <option value="12">Early Grey</option>
    <option value="13">Assam</option>
    <option value="14">Green</option>        
    <option value="15">Mint</option>
</select>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Medium</label></div>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Large</label></div><label id="qty"></label><a class="card-link" href="#">Mark as Sold Out</a></div>
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

            <div class="card-body col-md-4">
                <h4 class="card-title">Select Sides</h4><select>
                    <option value="" disabled selected>Food Choices</option>
                    <option value="12">Blueberry Cake</option>
                    <option value="13">Banana Bread</option>
                    <option value="14">Ham and Cheese Toastie</option>        
                    <a class="card-link" href="#">Mark as Sold Out</a>
                </select>
            </div>
            
</div><button class="btn btn-primary" type="button" id="order-btn">Cancel</button></div>
</div><button class="btn btn-primary" type="button" id="order-btn">Update Menu</button></div>
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