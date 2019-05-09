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
 * when order is clicked, send order info and customer info to server and redirect to paypal gateway.
 * 
 */
?>


<!doctype HTML>

<html>



</html>