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
$Q = $_GET['Q'];
$quantity = $_GET['quantity'];
$partid =  $_GET['pid'];
$price = $_GET['price'];


if ( $quantity == '' )
{
echo("You did not enter a quantity");
exit();
}  

else
{
$dbcnx = mysqli_connect("localhost", "root", "", "parts");

if (mysqli_connect_errno($dbcnx)){echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}



$sql="SELECT * FROM parts WHERE partid=$partid";


 $res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
        exit();
    }


else 
{
$row = mysqli_fetch_array($res); 
$Q=$row['quantity'];
  }
  


if($quantity > $Q){
echo("Not enough stock ");
exit();
}

else{
 echo ("Parts avaliable <br>");
}

$sqlsecondstatement="SELECT custid FROM customer WHERE custid='$custid'";


 $ressecondstatement = mysqli_query($dbcnx, $sqlsecondstatement);
if ( !$ressecondstatement ) {
        echo('Query failed ' . $sqlsecondstatement . ' Error:' . mysqli_error($dbcnx));
        exit();
    }


else 
{
$rowsecondstatement = mysqli_fetch_array($ressecondstatement); 
$Qsecondstatement=$rowsecondstatement['custid'];
  }
  


if($custid != $Qsecondstatement){
echo("Customer not in database");
exit();
}



else{
echo ("Thank You!");
}

$sqlthirdstatement="SELECT description FROM parts WHERE description ='$description'";
  $resthirdstatement = mysqli_query($dbcnx, $sqlthirdstatement);
if ( !$resthirdstatement ) {
        echo('Query failed ' . $sqlthirdstatement. ' Error:' . mysqli_error($dbcnx));
        exit();
    }
    
 else 
{
$rowthirdstatement = mysqli_fetch_array($resthirdstatement); 
$Qthirdstatement=$rowthirdstatement['CustId'];
  }
 
$sqlfourthstatement="SELECT price FROM part WHERE price ='$price'";
  $resfourthstatement = mysqli_query($dbcnx, $sqlfourthstatement);
if ( !$resfourthstatement ) {
        echo('Query failed ' . $sqlfourthstatement . ' Error:' . mysqli_error($dbcnx));
        exit();
    }
    
 else 
{
$rowfourthstatement = mysqli_fetch_array($resfourthstatement); 
$Qfourthstatement=$rowfourthstatement['partid'];
}  
  

  
$saledate= saledate("Y-m-d");
       
$sqlstatement="INSERT INTO sales(custid, partid, description, quantity, price) VALUES ($Qthirdstatement, $Qfourthstatement, '$saledate', $Q)";
  $resstatement = mysqli_query($dbcnx, $sqlstatement);
if ( !$resstatement ) {
        echo('Query failed ' . $sqlstatement . ' Error:' . mysqli_error($dbcnx));
        exit();
    }
    
  else{
  echo ("Sale Approved");
  exit();
  }
  
if ($res == '0') 
      {
        echo("<p>Error registering: " . mysqli_error() . "</p>");
      }
else
      {
         echo("<a href='adding-a-sale.php'> Click here to add another part");
      }
   mysqli_close($dbcnx); }	?>