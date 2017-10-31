<link rel="stylesheet" type="text/css" href="update-a-part.css" />
<body>
<img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="690">    <!--http://www.brunswickgarage.com/-->
<div id="content">
<nav>      <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>  <br>
<?php
$dbcnx = mysqli_connect("localhost", "root", "", "parts");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}



$ud_id=$_POST['ud_id'];
$ud_description=$_POST['ud_description'];
$ud_price=$_POST['ud_price'];
$ud_quantity=$_POST['ud_quantity'];

$sql="UPDATE parts SET description ='$ud_description', price ='$ud_price', quantity='$ud_quantity' WHERE partid=$ud_id";

$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error());
        exit();
    }

else
	{
  echo $res;
  if(mysqli_affected_rows($dbcnx)< 1){
  
  echo "<p><em> No updates</em></p>";  }
  else
  {
echo "Record Updated";}
  mysqli_close($dbcnx);

}
?>
