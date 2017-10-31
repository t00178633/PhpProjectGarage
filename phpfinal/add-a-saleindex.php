<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Garage Sales</title> 
    <meta charset='utf-8'> 
<link rel="stylesheet" type="text/css" href="add-a-part.css" />
</head>
<body>
<img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="700">  <!--http://www.brunswickgarage.com/--> 
<div id="content">
<nav>        <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>    <br>
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
echo "<tr><td><b>PartId</b></td>
<td>CustID</td><td>Price</td><td>Quantity</td></tr>";

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
} 
?> 
      <form method="POST" action="add-a-sale.php">     </form>
   <form action="add-a-sale.php" method="post">
    CustID: <input type ="text" name ="custid"><br>
    PartID: <input type="text" name="partid" ><br />
    Quantity: <input type="text" name="quantity"><br />
    <input type="submit" name="submitdetails" value="SUBMIT" />
     </form>

  </body>
</html>