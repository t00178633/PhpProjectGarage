
<link rel="stylesheet" type="text/css" href="add-a- customerphp.css" />
<body>
<img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="690">    <!--http://www.brunswickgarage.com/-->
<div id="content">
<nav>      <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>  <br>
      <div id="endbox">
<?php
$name = $_POST['name'];
$address = $_POST['address'];
$telephone = $_POST['telephone'];

if ($name == ''  or $address == '' or $telephone == '' )
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

if ($_POST['submitdetails'] == "SUBMIT") {

$name = mysqli_real_escape_string($dbcnx, $name);
$sql = "INSERT INTO customer(name,address, telephone) VALUES('$name', '$address', '$telephone')";
$res = mysqli_query($dbcnx, $sql);

if ($res == 0) 
      {
        echo("<p>Error registering: " . mysqli_error()  . "</p>");
      }
else
      {
      $last_id = mysqli_insert_id($dbcnx); 
         echo("<a href='add-a-customer.html'> Click here to enter another customer </a>");
         echo "<td><a href=\"adding-a-sale.php?custid=$last_id\">buy</a></td>";
            
         
      }  
}   mysqli_close($dbcnx); }

?>
</div></div>