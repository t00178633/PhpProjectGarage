<!DOCTYPE html>
<html lang='en'>
  <head>
      <title></title>
       <link rel="stylesheet" type="text/css" href="update-a-part.css" />
<body>
<img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="690">   <!--http://www.brunswickgarage.com/-->
<div id="content">
<nav>       <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>  <br>
<link rel="stylesheet" type="text/css" href="styles.css" />
   </head>
   
   <body>
 

<?php

$dbcnx = mysqli_connect("localhost", "root", "", "parts");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}


$sql ="SELECT * FROM parts";
$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
        exit();
    }


	else
	{
  
  if(mysqli_num_rows($res)< 1){
  echo "<p><em> No Parts</em></p>";  }
  else
  {


echo "<br /><b>Parts:</b><br /><br />";
echo "<table border=1>";
echo "<tr><td><b>Part Id</b></td>
<td>Description</td><td>Price</td><td>Quantity</td></tr>";

while ($row = mysqli_fetch_array($res)) {

echo ("<tr><td>");
echo $row['partid'];
echo("</td><td>");
echo $row['description'];
echo("</td><td>");
echo $row['price'];
echo("</td><td>");
echo $row['quantity'];
echo("</td></tr>");
} 
echo "</table>";

}  

 //free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);}
?>

<br /><br />
<form method="POST" action="update-a-partform.php">
<div>Enter ID to update:
<input type="text" name="record" size="10" maxlength="10"><br /><br />
<input type="submit" name="go" value="Search on that Input"></div></form>



</html>

