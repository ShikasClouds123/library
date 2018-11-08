<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "library");
$output = '';

if(isset($_POST["export"]))
{
 $query = "SELECT tblstudents.FullName,library_books.Book_Title,library_books.ISBN,tblissuedbookdetails.IssuesDate,
			tblissuedbookdetails.ReturnDate,tblissuedbookdetails.id as rid from  tblissuedbookdetails 
			join tblstudents on tblstudents.StudentId=tblissuedbookdetails.StudentId join library_books on 
			library_books.ID=tblissuedbookdetails.BookId order by tblissuedbookdetails.ID desc";


 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                        
						 <th>ISBN</th>  
                         <th>Book Title</th>  
                         <th>Issued Date</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
						<tr>  					
						 
                        <td>'.$row["ISBN"].'</td>  
                        <td>'.$row["Book_Title"].'</td>   
						<td>'.$row["IssuesDate"].'</td>  
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
