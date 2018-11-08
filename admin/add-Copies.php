<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['add']))
{
	
$BarCode=$_POST['BarCode'];
$ISBN=$_POST['ISBN'];
$Location=$_POST['Location'];
$Status=$_POST['Status'];

$sql="INSERT INTO  table_copies(BarCode,ISBN,Location,Status) VALUES(:BarCode,:ISBN,:Location,:Status)";
$query = $dbh->prepare($sql);
$query->bindParam(':BarCode',$BarCode,PDO::PARAM_STR);
$query->bindParam(':ISBN',$ISBN,PDO::PARAM_STR);
$query->bindParam(':Location',$Location,PDO::PARAM_STR);
$query->bindParam(':Status',$Status,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Book Listed successfully";
header('location:manage-books.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-books.php');
}

}




?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml " class="animated fadeIn">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Add Book</title>
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
</style>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
   
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Copies</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Add Additional Book Copies
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>BarCode<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="BarCode"  required="required" autocomplete="off"  />
</div>


<div class="form-group">
<label>ISBN<span style="color:red;">*</span></label>
<select class="form-control" name="ISBN" required="required">
<option value="">Select ISBN</option>

<?php 
$sql = "SELECT ISBN FROM  library_books";
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

<div class="form-group">
<label>Location<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="Location" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Status<span style="color:red;">*</span></label>
	<select name = "Status" class = "form-control">
		<option value = "none"> Select Status </option>
		
		<option> I </option>
		<option> O </option>
	</select>
</div>








<!-- <div class="form-group">
<label>Category<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="Book_Category" required="required">
</div> -->

 <!--<div class="form-group">
 <label>Price<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="price" autocomplete="off"   required="required" />
 </div> -->

<button type="submit" name="add" class="button"><span>Add </span></button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
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
