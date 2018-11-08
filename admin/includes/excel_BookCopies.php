<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "library");
$output = '';

if(isset($_POST["export"]))
{
 $query = "SELECT * from table_copies";

 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         
						 <th>#</th>  
                         <th>BarCode</th>  
                         <th>ISBN</th>
						 <th>Location</th> 
						 <th>Status</th>   						 
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
						<tr>  					
						
                        <td>'.$row["ID"].'</td>  
                        <td>'.$row["BarCode"].'</td>   
						<td>'.$row["ISBN"].'</td>  
						<td>'.$row["Location"].'</td>  
						<td>'.$row["Status"].'</td>  
						</tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
