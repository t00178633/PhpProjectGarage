<!DOCTYPE html>
<html lang='en'>
  <head> 
    <title>Item Select</title>
    <meta charset='utf-8'>
    

  </head>
  <body>
  
 <link rel="stylesheet" type="text/css" href="sale.css" />   
 
 
 <img src="homeslide1.jpg" alt="homeslide1.jpg, 212kB" title="Homeslide1" border="0" height="250" width="690">
<div id="content">
<nav>       <a href="home.html">Home</a>
            <a href="customer.html">Customers</a> 
            <a href="part.html">Parts</a>                                          
            <a href="sale.html">Sales</a> 
        
      </nav>  <br>
 
 
  
  <script type = "text/javascript">

 
function swap(num,Quantity) { 
   
   var which = "txtswap" + num;
   
var swapvalue  = document.getElementById(which).value;

window.location.href = "additems.php?quantity=" + swapvalue + "&Q=" + Quantity;
                                                                                                            
</script>
 
  
  <?php
  
  
 
$dbcnx = mysqli_connect("localhost", "root", "", "parts");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}


$sql = "SELECT * from parts";
$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error());
        exit();
    }

  
else
	{
  
  if(mysqli_num_rows($res)< 1){
  //there are no Sale Items
  $display_block = "<p><em> No Parts</em></p>";  }  
  else
  {
   //create the display string
      
    //$lastSaleId =  $_GET['lastsaleid'];
    //$lastCustId =  $_GET['lastCustIdAdded'];
   
   
  echo ("
   <table>
   <tr>
   <th>ParrtID</th>
   <th>Description</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Add To Sale</th>
    
   </tr>  ");
     $i=1;
   while($customer_info=mysqli_fetch_array($res)){
   
   $partid=$customer_info['partid'];
   $description=stripslashes($customer_info['description']); 
      $price=stripslashes($customer_info['price']);
     $quantity=stripslashes($customer_info['quantity']);
    
      echo("<tr><td align='center'>$partid</td><td align='center'>$description</td><td align='center'>$price</td><td align='center'>$quantity</td> "); 

      echo "<form action='confirmsale.php' method='get'>";                             
      echo '<td> <input required  type = "text" name = "txtswap'.$i.'" id = "txtswap'.$i.'" value="" size="10"></td>'; 
      echo "</form> ";                
      echo ("<td  align='center' colspan='6'><a href='javascript:void(0)' onclick='swap($i, $quantity)' >Add to Cart</a></td></tr>");
     
        
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

  