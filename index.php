<?php session_start();

include_once('tools.php');
styleCLink();
require_once 'tools.php';
echo '<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Menu</title>';
escript();




echo '
</head>
';

$echoer = new echoer();
$echoer->HeaderValue();



productList();

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

