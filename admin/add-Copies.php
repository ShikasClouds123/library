<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('functions.php');
// not logged in 

if(strlen($_SESSION['alogin'])==0)
{   
	header('location:index.php');
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="animated fadeIn">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />
<title>Online Library Management System | Add Book</title>
	<link href="assets/css/bootstrap10.css" rel="stylesheet" />
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/css/style6.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link href="assets/css/animate.css" rel="stylesheet" />
</head>

<!--CSS-->
<style>
.button {
border-radius: 4px;
background-color: #193654;
border: none;
color: #FFFFFF;
text-align: center;
font-size: 16px;
padding: 5px;
width: 80px;
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
 margin:0 auto;
  padding:0;
  text-align:center;
  height:2000px;
  background-color:silver;
}
#wrapper
{
  width:995px;
  padding:0px;
  margin:0px auto;
  font-family:Franklin Gothic;
  text-align:center;
}
input[type="text"]
{
  width:200px;
  height:35px;
  margin-right:2px;
  border-radius:3px;
  border:1px solid #193654;
  padding:5px;
}
input[type="button"]
{
  background:none;
  color:white;
  border:none;
  width:110px;
  height:35px;
  border-radius:3px;
  background-color:#193654;
  font-size:16px;
}
</style>

<body>

<!--Header-->
<?php include('includes/header.php');?>
   
<div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Book Copies</h4>
            </div>
		</div>
		
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-heading">
Title
</div>

<div class="panel-body">
<form method="POST" action="add-Copies.php" enctype="multipart/form-data" role ="form">

<div class="form-group">
<label>Barcode</label>
<input class="form-control" placeholder="Barcode" type="text" name="txtBarcode" 	autocomplete="off"/>
</div>

<div class="form-group">
<label>Book			 	<span style="color:red;">*</span>	</label>
<select class="form-control"  			name="txtType" 							required >
<option value="">Choose Book</option>
<?php 
$sql = "SELECT ISBN from  librarybooks GROUP BY ISBN";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->ISBN);?>">
<?php echo htmlentities($result->ISBN);?></option>
 <?php }} ?> 
</select>
</div>

<button type="submit" name="add" class="button"><span>Add </span></button>

</form>
                            </div>
                        </div>
                            </div>

        </div>
   
</div>
<script>
function add_field()
{
  var total_text=document.getElementsByClassName("input_text");
  total_text=total_text.length+1;
  document.getElementById("field_div").innerHTML=document.getElementById("field_div").innerHTML+
  "<p id='input_text"+total_text+"_wrapper'><input type='text' class='input_text' id='input_text"+total_text+"' placeholder='Enter Text'><input type='button' value='Remove' onclick=remove_field('input_text"+total_text+"');></p>";
}
function remove_field(id)
{
  document.getElementById(id+"_wrapper").innerHTML="";
}
</script>

</div>

</body>
<!--Footer-->
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>>

</html>

