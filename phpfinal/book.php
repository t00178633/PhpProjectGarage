<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>index</title>
    <meta charset='utf-8'>
      
    
    <script type="text/javascript">
<!--
function redirectTo(a,b) {

// this function takes the values passed up, assigns them to 2 local variables 
// we then put the file we want to open i.e. the php file into the .href and join on the varaibles something similar to a regular url query string NOTE no $ symbol
// in the php file we are calling we can access those values using $_GET['quantity'] and $_GET['bid'] as you can see in check_qty.php
var Quantity =a;
var PartId = b;
window.location.href = "check_quantity.php?quantity="+Quantity+"&bid="+PartIDId;

//-->
</script>
        
    
    
   </head>
   
  <body> 
      
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
  //there are no books
  $display_block = "<p><em> No Parts Available</em></p>";  }
  else
  {
   //create the display string
   $display_block = <<<END_OF_TEXT
   <table>
   <tr>
  <th>PartID</th>
   <th>Description</th>
   <th>quantity</th>
   <th>Price</th>
   <th>Qty</th>
   <th>Check</th>
    
    </tr>
END_OF_TEXT;
   
   while($part_info=mysqli_fetch_array($res)){
   
   $partid=$part_info['partid'];
   $pdescription=stripslashes($part_info['description']);   
   $pquantity=stripslashes($part_info['quantity']);
   $pprice=stripslashes($part_info['price']);
  
   
   //add to display
      $display_block .= <<<END_OF_TEXT
      <tr><td>$partid</td>
      <td>$pdescription</td>
      <td>$pquantity</td>
	    <td>$pprice</td>       
      <td><input type="text" style='width:20px' name="q" id="q"></td>
      
 
      <td><input type="button" style='width:20px' onclick="var textVal=document.getElementById('q').value; if(textVal > $pquantity) alert('not enough stock'); else redirectTo(textVal,$partid)"></td>        
      </tr>
      
      
END_OF_TEXT;
   
   
   }
  //free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);
   $display_block .="</table>";
    
  }
  echo '<br>';
  echo '<a href="home.html">Home</a>'; 
  echo '<br><br>'; 
 
 
 echo '<table>';
 echo '<tr><th>Add New Book</th><td><a href="add_book.php">Add Book</a></td></tr>';
 echo '<tr><th>Delete Book</th><td><a href="delete-a-book.html">Delete Book</a></td></tr>';
 echo '</table>';
 }
 ?>
  </head>
  <body>
  <h1> Books </h1>
  <?php echo $display_block; ?>
  </body>
  </html>
   
 
  </div> 
 
   

        </div>
        
    </body>
    </html>
        
   
  
      