<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "library");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT table_copies.BarCode,table_copies.ISBN, library_books.Book_Title,library_books.Book_Author, 
library_books.Book_Category,table_copies.Location FROM library_books 
INNER JOIN table_copies ON library_books.ISBN = table_copies.ISBN";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>BarCode</th>  
						 <th>ISBN</th>  
                         <th>Book Title</th>  
                         <th>Book Author</th>  
						 <th>Book Category</th>
						 <th>Location</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  					
						<td>'.$row["BarCode"].'</td>  
                         <td>'.$row["ISBN"].'</td>  
                        <td>'.$row["Book_Title"].'</td>  
                          <td>'.$row["Book_Author"].'</td>    
							<td>'.$row["Book_Category"].'</td> 
						<td>'.$row["Location"].'</td> 							
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
