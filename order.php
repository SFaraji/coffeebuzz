<?php
include_once('tools.php');

// Create connection
$conn = OpenCon();

$sql = "INSERT INTO `orders`(`name`, `details`, `price`) VALUES ('".$_POST['name']."','".$_POST['details']."','".$_POST['price']."')";
//echo $sql."<br/>";
$result = $conn->query($sql);

echo $result;

$conn->close();

?>