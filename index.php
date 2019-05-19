<?php 
  session_start();

  include_once('tools.php');
  styleCLink();
  require_once 'tools.php';

  $echoer = new echoer();
  $echoer->HeaderValue();

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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SCRUM TEAM">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    
    <title>coffeeBuzz</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
  
  </head>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    .hiddenMessage {
      display: none;
    }
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style> 

  <body>
    <!-- INSERT CODE FOR MENU DISPLAYING -->

    <div><nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
      <div class="container"><a href="index.php" class="navbar-brand">coffeeBuzz</a><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav mr-auto"></ul>
        <span class="navbar-text actions">
        <a class="btn btn-light action-button" href="login.php" style="border-radius: 5px">Login</a></span></div>
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

      <?php
        productList();
        escript();
      ?>

      <br/>
      <!--
      <div class="container">
        <div class="row">

          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Espresso</h4>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="espresso">
                  <label class="form-check-label">Small</label>
                  <br/>

                  <input class="form-check-input" type="radio" name="espresso">
                  <label class="form-check-label">Medium</label>
                  <br/>

                  <input class="form-check-input" type="radio" name="espresso">
                  <label class="form-check-label">Large</label>
                  <br/>
                </div>

                <label id="qty"></label>
                <a class="card-link" href="#">+</a><a class="card-link" href="#">-</a>
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
                <div role="menu" class="dropdown-menu">
                  <a role="presentation" href="#" class="dropdown-item">Blueberry Cake</a>
                  <a role="presentation" href="#" class="dropdown-item">Banana Bread</a>
                  <a role="presentation" href="#" class="dropdown-item">Ham and Cheese Toastie</a>
                </div>
              </div><button class="btn btn-primary" type="button" id="order-btn">ORDER NOW</button></div>
            </div>
          </div>
          
        </div>

    -->

    <div>
      <div class="container">
        <div class="row">
          <div><h4>Price:</h4></div>
          <br/>
        </div>
        <div class="row">
          <h4>$<span id="orderPrice">0.00</span></h4>
        </div>
        <span id="orderDetails" class="hiddenMessage"></span>
        <button class="hiddenMessage" onclick='
              let orderDetails = document.getElementById("orderDetails").innerText;
              var xhr = new XMLHttpRequest();
              xhr.open("POST", "/coffeebuzz/order.php", true);
              xhr.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("response").innerHTML = this.responseText;
                }
              };
              //xhr.setRequestHeader("Content-Type", "application/json");
              xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
              xhr.send("name=" + "Steven" + "&details=" + "Coffee,5,0,5");

              console.log("SENT REQUEST");
        '>ORDER
        </button>
      </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- PAYMENT PROCESSING -->
    <hr/>

    <div class="text-center">
      <div class="form-signin hiddenMessage" id='orderForm'>
        
        <h1 class="h3 mb-3 font-weight-normal">Payment</h1>
        <!--
        <label for="name" class="sr-only">Name</label>
        <input type="text" id="name" class="form-control" placeholder="Full Name" required>
        <br/>

        <label for="email" class="sr-only">Email</label>
        <input type="email" id="email" class="form-control" placeholder="Email Address" required>
        <br/>
        -->

        <!-- TEST PAYPAL ACCOUNT DETAILS:
          email: leeroy@gmail.com
          password: jenkins1

          reference: https://developer.paypal.com/docs/checkout/integrate/#5-capture-the-transaction
        -->
        <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=AUD"></script>
        <script>
          paypal.Buttons({
            createOrder: function(data, actions) {
              // Set up the transaction
              let price = document.getElementById("orderPrice").innerText;

              return actions.order.create({
                purchase_units: [{
                  amount: {
                    value: price
                  }
                }]
              });
            },
            onApprove: function(data, actions) {
              // Capture the funds from the transaction
              return actions.order.capture().then(function(details) {
                // Show a success message to your buyer
                alert('Transaction completed by ' + details.payer.name.given_name);

                let orderDetails = document.getElementById("orderDetails").innerText;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "order.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("name=" + details.payer.name.given_name + "&details=" + orderDetails);

                console.log("SENT REQUEST");

                document.getElementById("receipt").classList.remove("hiddenMessage");
              });
            }
          }).render('#orderForm');
        </script>
      </div>
    </div>

    <br/>
    <div id="receipt" class="hiddenMessage">
    </div>

    <br/>
    <div id="response" class="">
    </div>

  </body>

  <?php
      $echoer->FooterValue();
      echo '</html>';
    ?>

<details open>
  <summary>=Debug Show/Hide</summary>
  <pre>
    $_SESSION contains:
      <?php print_r($_SESSION); ?>

      $_POST contains:
      <?php var_dump($_POST); ?>
  </pre>
</details>



