<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 
//code for deletion of students
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from librarybooks  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$_SESSION['delmsg']="Category deleted scuccessfully ";
header('location:books-masterlist.php');

}


    ?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="animated fadeIn">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Manage Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap10.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
  background-color: #000;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 5px;
  width: 80px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
  font-family: Comic Sans MS;
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
                <h4 class="header-line">Books Master List</h4>
    </div>
     <div class="row">
    <?php if($_SESSION['error']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong> 
 <?php echo htmlentities($_SESSION['error']);?>
<?php echo htmlentities($_SESSION['error']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['msg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['updatemsg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['updatemsg']);?>
<?php echo htmlentities($_SESSION['updatemsg']="");?>
</div>
</div>
<?php } ?>


   <?php if($_SESSION['delmsg']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['delmsg']);?>
<?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
</div>
<?php } ?>

</div>


        </div>
            
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body" style="overflow-x: auto;">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>#</th>
										    <th>ISBN</th>
                                            <th>Barcode</th>
                                            <th>Callnumber</th>
											<th>Title</th>
											<th>Subtitle</th>
											<th>Author</th>
											<th>Edition</th>
											<th>Publisher</th>
											<th>Copyright</th>
                                           	<th>Physical Description</th>
											<th>Series</th> 
											<th>Subject</th>   
											<th>Location</th>
											<th>Material</th>
											<th>Status</th> 
											<th>Action</th> 
                                    </thead>
                                    <tbody>
<?php $sql = 	"SELECT * FROM librarybooks";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               
?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
										    <td class="center"><?php echo htmlentities($result->ISBN);?></td>
                                            <td class="center"><?php echo htmlentities($result->Barcode);?></td>
                                            <td class="center"><?php echo htmlentities($result->Callnumber);?></td>
											<td class="center"><?php echo htmlentities($result->Title);?></td>
											<td class="center"><?php echo htmlentities($result->Subtitle);?></td>
											<td class="center"><?php echo htmlentities($result->Author);?></td>
											<td class="center"><?php echo htmlentities($result->Edition);?></td>
											<td class="center"><?php echo htmlentities($result->Publisher);?></td>
											<td class="center"><?php echo htmlentities($result->Copyright);?></td>
											<td class="center"><?php echo htmlentities($result->Physicaldesc);?></td>
											<td class="center"><?php echo htmlentities($result->Series);?></td>
											<td class="center"><?php echo htmlentities($result->Subject_1);?></td>
											<td class="center"><?php echo htmlentities($result->Location);?></td>
											<td class="center"><?php echo htmlentities($result->Material);?></td>
											<td class="center"><?php if($result->Status=="I")
												{
													echo htmlentities("Available");
												}
												else 
												{
												echo htmlentities("On Loan");
												}
                                            ?>
											</td>	
											<td class="center">
												<a href="books-masterlist.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete this student?');"> 
												<button class="btn btn-danger"> Delete</button> 
										   </td>
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
