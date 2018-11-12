<?php 
require_once("includes/config.php");
if(!empty($_POST["Barcode"])) {
  $Barcode=$_POST["Barcode"];
 
    /*
	$sql ="SELECT BarCode, Book_Title, Status
			FROM table_copies 
			INNER JOIN library_books
			ON table_copies.ISBN = library_books.ISBN
			WHERE (BarCode=:bookid)";
	*/
$sql = "SELECT Barcode,Title,Status FROM librarybooks WHERE (Barcode=:Barcode)";

$query= $dbh -> prepare($sql);
$query-> bindParam(':Barcode', $Barcode, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;

if($query -> rowCount() > 0)
{
  foreach ($results as $result) {?>
	<?php if($result->Status === 'I') { ?>
		<option><?php echo htmlentities($result->Title . ' (Available)');?></option> 
		<script>$('#submit').prop('disabled', false);</script>
	<?php } else { ?>
		<option><?php echo htmlentities($result->Title. ' (Unavailable)');?></option>
		<script>$('#submit').prop('disabled', true);</script>
	<?php } ?>
<?php
}
}
 else{?>  

<option class="others"> Invalid BarCode</option>
<?php
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
