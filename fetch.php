<?php
$connect = mysqli_connect("localhost", "root", "", "library");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM library_books 
	WHERE ISBN LIKE '%".$search."%'
	OR Book_Title LIKE '%".$search."%' 
	OR Book_Author LIKE '%".$search."%' 
	OR Book_Category LIKE '%".$search."%' 

	";
}
else
{
	$query = "
	SELECT * FROM library_books ORDER BY ISBN";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>ISBN</th>
							<th>Book_Title</th>
							<th>Book_Author</th>
							<th>Book_Category</th>
							
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["ISBN"].'</td>
				<td>'.$row["Book_Title"].'</td>
				<td>'.$row["Book_Author"].'</td>
				<td>'.$row["Book_Category"].'</td>
				
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>