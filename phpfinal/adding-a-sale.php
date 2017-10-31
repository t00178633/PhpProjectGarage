<!DOCTYPE html>
<html lang='en'>
  <head> 
    <title>Shopping Cart</title>
    <meta charset='utf-8'>
    

  </head>
  <body>
  
 <link rel="stylesheet" type="text/css" href="sale.css" />   
 
 
 <img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="690">  <!--http://www.brunswickgarage.com/-->
<div id="content">
<nav>       <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>  <br>
 
 
  
  <script type = "text/javascript">

 
function swap(num, Quantity, pid, price) { 
   
   var which = "txtswap" + num;
   
var swapvalue  = document.getElementById(which).value;

window.location.href = "restructedsales.php?quantity=" + swapvalue + "&Q=" + Quantity + "&pid=" + pid + "&price=" + price;
}
                                                                                                           
</script>
 
  
  <?php
  
  
 
$dbcnx = mysqli_connect("localhost", "root", "", "parts");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();
}


$sql = "SELECT * from parts";
$res = mysqli_query($dbcnx, $sql);
if (!$res) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error());
        exit();
    }

  
else
	{
  
  if(mysqli_num_rows($res)< 1){
 
  $display_block = "<p><em> No Parts</em></p>";  }  
  else
  {
   
  echo ("
   <table>
   <tr>
   <th>ParrtID</th>
   <th>Description</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Add To Cart</th>
    
   </tr>  ");
     $i=1;
   while($customer_info=mysqli_fetch_array($res)){
   
   $partid=$customer_info['partid'];
   $description=stripslashes($customer_info['description']); 
      $price=$customer_info['price'];
     $quantity=$customer_info['quantity'];
    
      echo("<tr><td align='center'>$partid</td><td align='center'>$description</td><td align='center'>$price</td><td align='center'>$quantity</td> "); 
                                
      echo '<td> <input required  type = "text" name = "txtswap'.$i.'" id = "txtswap'.$i.'" value="" size="10"></td>'; 
                   
      echo ("<td  align='center' colspan='6'><a href='javascript:void(0)' onclick='swap($i, $quantity, $partid, $price)'>Add to Cart</a></td></tr>");
               
       $i++;
            
   }
   
      
                    
   echo("</table>");
  //free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);

  }
  
  }  

	?>
  

       </body>
</html>

  