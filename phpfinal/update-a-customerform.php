<!DOCTYPE html>
<html lang='en'>
  <head>
      <title></title>

<link rel="stylesheet" type="text/css" href="styles.css" />
   </head>
   <link rel="stylesheet" type="text/css" href="update-a-customer.css" />
<body>
<img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="690">  <!--http://www.brunswickgarage.com/-->
<div id="content">
<nav>       <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>  <br>
<?php

$dbcnx = mysqli_connect("localhost", "root", "", "parts");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}


$id=(int)$_POST['record'];

$sql="SELECT * FROM customer WHERE custid=$id";

$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
        exit();
    }


else 
{
$row = mysqli_fetch_array($res); 
$name=$row['name'];
$address=$row['address'];
$telephone=$row['telephone'];

}
//free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);
?>

<form action="updated-a-customer.php" method="post">
<input type="hidden" name="ud_id" value="<?php echo $id; ?>">
First Name: <input type="text" name="ud_name" value="<?php echo $name; ?>"><br />
Address: <input type="text" name="ud_address" value="<?php echo $address; ?>"><br />
Telephone: <input type="text" name="ud_telephone" value="<?php echo $telephone; ?>"><br />


<div id="updatebutton"><input type="Submit" value="Update"></div>
</form>










</body>

</html>
