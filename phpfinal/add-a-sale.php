<link rel="stylesheet" type="text/css" href="add-a-sale.css" />
<body>
<img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="690">  <!--http://www.brunswickgarage.com/-->
<div id="content">
<nav>        <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>  <br>
<?php
$custid = $_POST['custid'];
$partid = $_POST['partid'];
$quantity = $_POST['quantity'];

if ($custid == '' or $partid == '' or $quantity == '' )
{
echo("You did not complete the insert form correctly <br>");
exit();
} 
else
{
$dbcnx = mysqli_connect("localhost", "root", "" , "Parts");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();
}
$res = mysqli_query($dbcnx);
while ($row = mysqli_fetch_array($res))
$chkQuantity=$row['quantity'];


if ($quantity > $chkQuantity)
{
  echo("Error, There is not enough stock for your order");
}
else
{
 echo ("Thank you, Come again"); 
}

if ($_POST['submitdetails'] == "SUBMIT") {

$custid = mysqli_real_escape_string($dbcnx, $custid);
$sql = "INSERT INTO sales(custid, partid, quantity) VALUES('$custid', '$partid', '$quantity')";
$res = mysqli_query($dbcnx, $sql);

         echo("<a href='add-a-saleindex.php'> Click here to enter another sale </a>");
      }
}   mysqli_close($dbcnx); 
 
?>