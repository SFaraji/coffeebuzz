<?php
//print_r($_POST);
//echo "<br/>APPLE<br/>";

//echo 'Hello ' . htmlspecialchars($_REQUEST["name"]) . '<br/>';
//echo 'DETAILS: ' . htmlspecialchars($_REQUEST["details"]) . '<br/>';

$servername = "localhost";
$username = "root";
$password = "admin";
$db = "coffeebuzz";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

$sql = "INSERT INTO `orders`(`name`, `details`) VALUES ('".$_POST['name']."','".$_POST['details']."')";
//echo $sql."<br/>";
$result = $conn->query($sql);

echo $result;

$conn->close();

?>