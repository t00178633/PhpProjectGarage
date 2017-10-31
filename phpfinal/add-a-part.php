<link rel="stylesheet" type="text/css" href="add-a-part.css" />
<body>
<img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="690">   <!--http://www.brunswickgarage.com/-->
<div id="content">
<nav>        <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>  <br>
<?php
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

if ($description == '' or $price == '' or $quantity == '' )
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

if ($_POST['submitdetails'] == "SUBMIT") {

$description = mysqli_real_escape_string($dbcnx, $description);
$sql = "INSERT INTO parts(description, price, quantity) VALUES('$description', '$price', '$quantity')";
$res = mysqli_query($dbcnx, $sql);

if ($res == 0) 
      {
        echo("<p>Error registering: " . mysqli_error()  . "</p>");
      }
else
      {
         echo("<a href='add-a-part.html'> Click here to enter another part </a>");
      }
}   mysqli_close($dbcnx); }

?>