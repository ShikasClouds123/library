<?php
include('includes/config.php');
try { 
			$txtISBN = $_POST['txtISBN1'];
			$txtBarcode = $_POST['txtBarcode1'];
			$txtCallnumber = $_POST['txtCallnumber1'];
			$txtBookTitle = $_POST['txtBookTitle1'];
			$txtSubtitle = $_POST['txtSubtitle1'];
			$txtAuthor = $_POST['txtAuthor1'];
			$txtEdition = $_POST['txtEdition1'];
			$txtPublisher = $_POST['txtPublisher1'];
			$txtCopyright = $_POST['txtCopyright1'];
			$txtDescription = $_POST['txtDescription1'];
			$txtSeries = $_POST['txtSeries1'];
			$txtSubject1 = $_POST['txtSubject11'];
			$txtSubject2 = $_POST['txtSubject21'];
			$txtSubject3 = $_POST['txtSubject31'];
			$txtSubject4 = $_POST['txtSubject41'];
			$txtLocation = $_POST['txtLocation1'];
			$txtType = $_POST['txtType1'];

			$conn = new mysqli("localhost", "root", "", "library");

			$sql="INSERT INTO librarybooks(ISBN,Barcode,Callnumber,Title,Subtitle,Author,
		Edition,Publisher,Copyright,Physicaldesc,Series,Subject_1,Subject_2,Subject_3,
		Subject_4,Location,Material,Status) VALUES ('$txtISBN','$txtBarcode','$txtCallnumber','$txtBookTitle','$txtSubtitle','$txtAuthor','$txtEdition','$txtPublisher','$txtCopyright','$txtDescription','$txtSeries','$txtDescription','$txtSubject1','$txtSubject2','$txtSubject3','$txtSubject4','$txtLocation','$txtType')";

			if($conn->query($sql) === TRUE) {
			echo "Data Added";
			}

			else{
				echo "Data not Added";
			}

}
catch(Exception $e) {
	echo 'Message:' .$e->getMessage();
}