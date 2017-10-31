<!DOCTYPE html>
<html lang='en'>
  <head> 
    <title>Item Select</title>
    <meta charset='utf-8'>
    

  </head>
  <body>
  
 <link rel="stylesheet" type="text/css" href="sale.css" />   
 
 
 <img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="690">   <!--http://www.brunswickgarage.com/-->
<div id="content">
<nav>       <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>  <br>
<?php 
 $addtocart = ['Add To Cart']
if ($addtocart== '' )
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

?>