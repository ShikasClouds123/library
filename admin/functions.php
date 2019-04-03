<?php 

if(isset($_POST['add'])){ 
addcopies();    
}

function addcopies() {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "librarylatest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `librarybooks` where ISBN = '" . $_POST['txtISBN'] . "' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    //inserting statement   
    $sql1 = "INSERT INTO librarybooks (ISBN, Barcode, Callnumber,Title,Subtitle,Author,Edition,Publisher,Placeofpublication,
    Copyright,Physicaldesc,Series,Subject_1,Location,Material,Status)
    VALUES ('" . $_POST['txtISBN']. "', '" . $_POST['txtBarcode']. "' ,   '" . $row['Callnumber']. "' ,  '" . $row['Title']. "' ,  
    '" . $row['Subtitle']. "' ,  '" . $row['Author']. "' ,  '" . $row['Edition']. "' ,  '" . $row['Publisher']. "' ,
    '" . $row['Placeofpublication']. "' ,  '" . $row['Copyright']. "' ,  '" . $row['Physicaldesc']. "' ,  '" . $row['Series']. "' ,  
    '" . $row['Subject_1']. "' ,  '" . $row['Location']. "' ,'" . $row['Material']. "','I')";
    
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