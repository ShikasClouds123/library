<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login']) == 0)
{   
	header('location:index.php');
}
else
{ 
	if(isset($_POST['update']))
	{    


$sid=$_SESSION['stdid'];  
$fname=$_POST['fullname'];
$mobileno=$_POST['mobileno'];
$Course=$_POST['Course'];
$YearLevel=$_POST['YearLevel'];

$sql="update tblstudents set FullName=:fname,MobileNumber=:mobileno,Course=:Course,YearLevel=:YearLevel where StudentId=:sid";
$query = $dbh->prepare($sql);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':Course',$Course,PDO::PARAM_STR);
$query->bindParam(':YearLevel',$YearLevel,PDO::PARAM_STR);
$query->execute();

echo '<script>alert("Your profile has been updated")</script>';
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
    <title>Online Library Management System | Student Signup</title>
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
  background-color: #193654;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 5px;
  width: 140px;
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
                <h4 class="header-line">My Profile</h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           My Profile
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="post">
<?php 
$sid=$_SESSION['stdid'];
$sql="SELECT StudentId,user_image,FullName,EmailId,YearLevel,Course,MobileNumber,RegDate,UpdationDate,Status from  tblstudents  where StudentId=:sid ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':sid', $sid, PDO::PARAM_STR);
$query->execute();
$students = $query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($students as $student)
{               ?>  

<div class="form-group">
  <label>Profile Picture : </label>
  <img src="<?php echo htmlentities($student->user_image);?>" class="img-responsive" style="width: 150px; height: 150px;" />
</div>

<div class="form-group">
  <label>Student ID : </label>
  <?php echo htmlentities($student->StudentId);?>
</div>

<div class="form-group">
  <label>Year Level : </label>
  <?php echo htmlentities($student->YearLevel);?>
</div>

<div class="form-group">
  <label>Course : </label>
  <?php echo htmlentities($student->Course);?>
</div>

<div class="form-group">
  <label>Reg Date : </label>
  <?php echo htmlentities($student->RegDate);?>
</div>

<div class="form-group">
  <label>Last Updation Date : </label>
  <?php echo htmlentities($student->UpdationDate ?: 'N/A');?>
</div>


<div class="form-group">
  <label>Profile Status : </label>
  <?php if($student->Status==1){?>
    <span style="color: green">Active</span>
  <?php } else { ?>
    <span style="color: red">Blocked</span>
  <?php }?>
</div>


<div class="form-group">
<label>Enter Full Name</label>
<input class="form-control" type="text" name="fullname" value="<?php echo htmlentities($student->FullName);?>" autocomplete="off" required />
</div>


<div class="form-group">
<label>Mobile Number :</label>
<input class="form-control" type="text" name="mobileno" maxlength="11" value="<?php echo htmlentities($student->MobileNumber);?>" autocomplete="off" required />
</div>
                                        
<div class="form-group">
<label>Enter Email</label>
<input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($student->EmailId);?>"  autocomplete="off" required readonly />
</div>
<?php }} ?>

<div class="form-group">
<label>Enter Course<span style="color:red;">*</span></label>
<select class="form-control" name="Course" required="required">
<option value="<?php echo htmlentities($student->Course); ?>"> <?php echo htmlentities($student->Course); ?> </option>
<?php 
  $sql = "SELECT * from  tblcourse";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query->rowCount() > 0)
  {
  foreach($results as $result)
  {               ?>  
  <option value="<?php echo htmlentities($result->Course);?>">
  <?php echo htmlentities($result->Course);?></option>
 <?php }} ?> 
</select>
</div>


<div class="form-group">
<label>Enter Year Level<span style="color:red;">*</span></label>
<select class="form-control" name="YearLevel" required>
<option value="<?php echo htmlentities($students[0]->YearLevel); ?>"> 
<?php echo htmlentities($students[0]->YearLevel); ?> </option>

<?php 

  $sql = "SELECT * from  tblyearlevel";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $YearLevel=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  foreach($YearLevel as $result){  
      $result = htmlentities($result->YearLevel);
?>

  <option value="<?php echo $result?>">
    <?php echo $result ?>
  </option>
  
<?php } ?>
 
</select>
</div>
                              
<button type="submit" name="update" class="button" id="submit"><span>Update Now</span></button>

                                    </form>
                            </div>
                        </div>
                            </div>
        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>

