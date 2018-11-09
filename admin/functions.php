<?php 

if(isset($_POST['add'])){ 
addcopies();	
}

function addcopies() {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `librarybooks` where ISBN = '" . $_POST['txtType'] . "' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["Callnumber"]. " - Name: " . $row["Title"]. " " . $row["Subtitle"]." " . $row["Author"]." " . $row["Edition"]." " . $row["Publisher"]." "
		. $row["Copyright"] . " " . $row["Physicaldesc"]." " . $row["Series"]." " . $row["Subject_1"]. " " . $row["Subject_2"]." " . $row["Subject_3"]." " . $row["Subject_4"]. 
		" " . $row["Location"]." " . $row["Material"]. " " . $row["Status"]."<br>";

	$sql1 = "INSERT INTO librarybooks (ISBN, Barcode, Callnumber,Title,Subtitle,Author,Edition,Publisher,Copyright,Physicaldesc,Series,Subject_1,Subject_2,Subject_3,Subject_4,Location,Material)
	VALUES ('" . $_POST['txtType']. "', '" . $_POST['txtBarcode']. "' ,   '" . $row['Callnumber']. "' ,  '" . $row['Title']. "' ,  '" . $row['Subtitle']. "' ,  '" . $row['Author']. "' ,  '" . $row['Edition']. "' ,  
	'" . $row['Publisher']. "' ,  '" . $row['Copyright']. "' ,  '" . $row['Physicaldesc']. "' ,  '" . $row['Series']. "' ,  '" . $row['Subject_1']. "' ,  '" . $row['Subject_2']. "' ,  '" . $row['Subject_3']. "' ,
	'" . $row['Subject_4']. "' , '" . $row['Location']. "' , '" . $row['Material']. "')";
	
if ($conn->query($sql1) === TRUE) {
    //echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}
    }
} else {
    //echo "0 results";
}
$conn->close();
}
?>