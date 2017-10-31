<link rel="stylesheet" type="text/css" href="add-a- customerphp.css" />
<body>
<img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="700">   <!--http://www.brunswickgarage.com/-->
<div id="content">
<nav>        <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a>  
        
      </nav>



<p>Garage Repairs has been selling genuine parts at genuine prices to customers all over the couintry for 
   over 10 years now. Having started out as a retailer in an industrial estate, through the call for parts
   we have now expanded our grasp to the internet where we can send motor parts across the world at low prices</p>




<p>All Customers Registered With Us.</p><br>
<?php
$dbcnx = mysqli_connect("localhost", "root", "", "parts");
if (mysqli_connect_errno($dbcnx ))
{
   echo "Failed to connect to MySQL: " .mysqli_connect_error();
   exit();
}

else {
$sql = "SELECT * from customer";
$res = mysqli_query($dbcnx, $sql);
if ( !$res ) 
{
   echo('Query failed ' . $sql . ' Error:' . mysqli_error());
   exit();
}
else
{
   if(mysqli_num_rows($res)< 1){

      echo "<p><em> No Customers</em></p>";
      exit();  }
   else {
      while ( $row = mysqli_fetch_array($res) ) {
      echo("<p>". $row['custid']. stripslashes($row['name']). "</p>");
      }
}} 
mysqli_free_result($res);
mysqli_close($dbcnx);
}
?>