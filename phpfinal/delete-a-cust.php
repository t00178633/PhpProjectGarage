<link rel="stylesheet" type="text/css" href="delete-a-cust.css" />
<body>
<img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="690">    <!--http://www.brunswickgarage.com/-->
<div id="content">
<nav>       <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>  <br>
      <div id="endbox">
<?php
$custid = (int) $_POST['custid'];

if ($custid == '' or !is_numeric($custid))
{
echo("You did not complete the delete form correctly <br>");
exit();
}

else
{
$dbcnx = mysqli_connect("localhost", "root", "", "parts");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: ".mysqli_connect_error();
exit();
}
$sql = "DELETE from customer WHERE custid = $custid";
 $res = mysqli_query($dbcnx, $sql);  
 
 if($res){
		$count = mysqli_affected_rows($dbcnx);
	}
	if($count>0){
         echo("Customer no. " . " ". $custid. " " . "has been deleted successfully");
             }
     else{
             echo "No such record deleted";
          }
     mysqli_close($dbcnx);	 }
     
?>
 


