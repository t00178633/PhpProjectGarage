<!DOCTYPE html>
<html lang='en'>
  <head>
      <title></title>
<link rel="stylesheet" type="text/css" href="update-a-part.css" />
<body>
<img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="690">  <!--http://www.brunswickgarage.com/-->
<div id="content">
<nav>       <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>  <br>
<link rel="stylesheet" type="text/css" href="styles.css" />
   </head>
<?php

$dbcnx = mysqli_connect("localhost", "root", "", "parts");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}


$id=(int)$_POST['record'];

$sql="SELECT * FROM parts WHERE partid=$id";

$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
        exit();
    }


else 
{
$row = mysqli_fetch_array($res); 
$description=$row['description'];
$price=$row['price'];
$quantity=$row['quantity'];

}
//free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);
?>

<form action="updated-a-part.php" method="post">
<input type="hidden" name="ud_id" value="<?php echo $id; ?>">
Description: <input type="text" name="ud_description" value="<?php echo $description; ?>"><br />
Price: <input type="text" name="ud_price" value="<?php echo $price; ?>"><br />
Quantity: <input type="text" name="ud_quantity" value="<?php echo $quantity; ?>"><br />


<input type="Submit" value="Update">
</form>










</body>

</html>
