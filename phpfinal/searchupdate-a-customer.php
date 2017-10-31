<!DOCTYPE html>
<html lang='en'>
  <head>
      <title>Update</title>

<link rel="stylesheet" type="text/css" href="styles.css" />
   </head>
   
   <body>
<link rel="stylesheet" type="text/css" href="update-a-customer.css" />
<body>
<img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="690">  <!--http://www.brunswickgarage.com/-->
<div id="content">
<nav>       
            <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>  <br> 

<?php

$dbcnx = mysqli_connect("localhost", "root", "", "parts");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}


$sql ="SELECT * FROM customer";
$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
        exit();
    }


	else
	{
  
  if(mysqli_num_rows($res)< 1){
  echo "<p><em> No customers</em></p>";  }
  else
  {


echo "<br /><b>Customers:</b><br /><br />";
echo "<table border=1>";
echo "<tr><td><b>User Id</b></td>
<td>FirstName</td><td>Address</td><td>Telephone</td></tr>";

while ($row = mysqli_fetch_array($res)) {

echo ("<tr><td>");
echo $row['custid'];
echo("</td><td>");
echo $row['name'];
echo("</td><td>");
echo $row['address'];
echo("</td><td>");
echo $row['telephone'];
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
<form method="POST" action="update-a-customerform.php">
<div>Enter ID to update:
<input type="text" name="record" size="10" maxlength="10"><br /><br />
<input type="submit" name="go" value="Search on that Input"></div></form>
 </body>


</html>

