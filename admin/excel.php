<?php  
session_start();
error_reporting(0);
//include('includes/config.php');
$connect = mysqli_connect("localhost", "root", "");
mysqli_select_db($connect,'library');

if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{


if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");

    $rows   = array_map('str_getcsv', file($_FILES['file']['tmp_name']));
    $header = array_shift($rows);
    $csv    = array();
    $BatchInsert = array();
    $SQLInsert = array();
    foreach($rows as $row) {
      //$row[0] = intval(strtotime(htmlspecialchars($row[0])));
        $csv[] = array_combine($header, $row);

    }
  //die (var_dump($csv));
    foreach ($csv as $rows) {
      $BatchInsert[]=implode("','",$rows);
        
          }

      foreach ($BatchInsert as $value) {
      $query = "INSERT into librarybooks(ISBN,Barcode,Callnumber,Title,Subtitle,Author,Edition,Publisher,Copyright,Physicaldesc,Series,Subject_1,Subject_2,Subject_3,Subject_4,Location,Material,Status) values ('$value')";
    /*echo "<pre>";
    die (var_dump($query));
    echo "</pre>"; */ 
/*
   while($data = fgetcsv($handle))
   {
				$item1 = mysqli_real_escape_string($connect, $data[0]);  
        $item2 = mysqli_real_escape_string($connect, $data[1]);
				$item3 = mysqli_real_escape_string($connect, $data[2]);
				$item4 = mysqli_real_escape_string($connect, $data[3]);
				$item5 = mysqli_real_escape_string($connect, $data[4]);
				$item6 = mysqli_real_escape_string($connect, $data[5]);
				$item7 = mysqli_real_escape_string($connect, $data[6]);
				$item8 = mysqli_real_escape_string($connect, $data[7]);
				$item9 = mysqli_real_escape_string($connect, $data[8]);
				$item10 = mysqli_real_escape_string($connect, $data[9]);
				$item11 = mysqli_real_escape_string($connect, $data[10]);
				$item12 = mysqli_real_escape_string($connect, $data[11]);
				$item13 = mysqli_real_escape_string($connect, $data[12]);
				$item14 = mysqli_real_escape_string($connect, $data[13]);
				$item15 = mysqli_real_escape_string($connect, $data[14]);
				$item16 = mysqli_real_escape_string($connect, $data[15]);
				$item17 = mysqli_real_escape_string($connect, $data[16]);
				$item18 = mysqli_real_escape_string($connect, $data[17]);
				
                $query = "INSERT into librarybooks(ISBN, Barcode, Callnumber, Title, Subtitle, Author, Edition, Publisher, Copyright, Physicaldesc, Series, Subject_1, Subject_2, Subject_3, Subject_4, Location, Material, Status) values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9','$item10','$item11','$item12','$item13','$item14','$item15','$item16','$item17','$item18')";

*/
                mysqli_query($connect, $query);
   }

   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="animated fadeIn">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Online Library Management System | Excel Upload</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap10.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style6.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<!-- Animation -->
	<link href="assets/css/animate.css" rel="stylesheet" />

</head>
<style>
.button {
  border-radius: 4px;
  background-color: #152f49;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 5px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
  font-family: Franklin Gothic;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
 <body> 
     <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
  <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Uploading Of Excel</h4>
                
                            </div>

        </div> 
  <form method='POST' enctype='multipart/form-data'>
   <div align="center">  
    <label>Select CSV File to be Uploaded in the Database:</label>
    <p><input type='file' name='file'/></p>
	<br>
    <p><input type='submit' name='submit' value='Import'  class='button'/></p>
   </div>
   <br>
  </form>


  </div>
</div>
    <!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script> 
	
	 </body>  
</html>
<?php } ?>