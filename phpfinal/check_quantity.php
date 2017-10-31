<?php
 $dbcnx = mysqli_connect("localhost", "root", "", "parts");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}

$quantity = (int) $_GET['quantity'];
echo $quantity;
$partid = (int) $_GET['partid'];
echo $partid ;

?>