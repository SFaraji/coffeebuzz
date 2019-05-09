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


<!doctype HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Steven Korevaar">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <title>Payment Page</title>
  
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



    <!-- PAYMENT PROCESSING -->

    <body class="text-center">
    <form class="form-signin" id='loginForm'>
      <h1 class="h3 mb-3 font-weight-normal">Customer Details</h1>

      <label for="name" class="sr-only">Name</label>
      <input type="text" id="name" class="form-control" placeholder="Full Name" required>
      <br/>

      <label for="email" class="sr-only">Email</label>
      <input type="email" id="email" class="form-control" placeholder="Email Address" required>
      <br/>

      <!-- TEST PAYPAL ACCOUNT DETAILS:
        email: leeroy@gmail.com
        password: jenkins1
      -->
      <script src="https://www.paypal.com/sdk/js?client-id=sb?currency=AUD"></script>
      <script>paypal.Buttons().render('#loginForm');</script>

    </form>

  </body>

  <footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="css/login.css" rel="stylesheet">
  </footer>

</html>