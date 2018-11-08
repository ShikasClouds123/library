<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST['login']))
{
  //code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {
$email=$_POST['emailid'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
 foreach ($results as $result) {
 $_SESSION['stdid']=$result->StudentId;
if($result->Status==1)
{
$_SESSION['login']=$_POST['emailid'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else {
echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";

}
}

} 

else{
echo "<script>alert('Invalid Details');</script>";
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
    <title>Online Library Management System | </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap6.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style7.css" rel="stylesheet" />
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
  padding: 10px;
  width: 110px;
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
<h4 class="header-line">Searching</h4>
</div>
</div>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                  
						
							
												
                        </div>
                        <div class="panel-body" style="width: 120%;">
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
