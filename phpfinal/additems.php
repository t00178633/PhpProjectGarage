<!DOCTYPE html>
<html lang='en'>
  <head> 
    <title>Item Select</title>
    <meta charset='utf-8'>
    

  </head>
  <body>
  
 <link rel="stylesheet" type="text/css" href="sale.css" />   
 
 
 <img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="690">    <!--http://www.brunswickgarage.com/-->
<div id="content">
<nav>       <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>  <br>
<?php  

$Quantity = $_GET['quantity'];
$Q= $_GET['Q'];
$custid = ['custid'];
$partid = ['partid'];
$description = ['description'];
$price = ['price']; 

if ($Q < $Quantity) 
      {
        echo("<p>Not Enough Stock</p>");
      }
      
else  {
 echo("Item Added Successfully");

 $dbcnx = mysqli_connect("localhost", "root", "" , "Parts");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
 exit();  } 
 else{
 
$custid = mysqli_real_escape_string($dbcnx, $custid);
$sql= "INSERT INTO sales(custid, partid,description, price) VALUES('$custid','$partid', '$description', '$price')";
$res = mysqli_query($dbcnx, $sql);  

if ($res == 0) 
      {
        echo("<p>Error registering: " . mysqli_error($dbcnx)  . "</p>");
      }
else
      {
    
         echo("<a href='adding-a-sale.php'> Click here to add another item </a>");
         echo "<td><a href=\'adding-a-sale.php'</a></td>";
            
         
      }  
}   mysqli_close($dbcnx); }  
?>