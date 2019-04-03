<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="animated fadeIn">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | User Dash Board</title>
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
table {
    font-family: Franklin Gothic, sans-serif;
    border-collapse: collapse;
    width: 55%;
    margin: 0px;
    height: 0px;
    margin-left: 700px;

}

td, th {
    border: 2px solid #000;
    text-align: left;
    padding: 15px;
}

tr:nth-child(even) {
    background-color: #fff;
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
                <h4 class="header-line">USER DASHBOARD</h4>
                
                            </div>

        </div>
             
             <div class="row">



            
                 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <a href="search.php"><i class="fa fa-book fa-5x"></i>
                          
<?php 
$sql ="SELECT id from librarybooks ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$listdbooks=$query->rowCount();
?>

                            <h3><?php echo htmlentities($listdbooks);?> </h3>
                            Books Listed
                        </div>
                    </div>
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <a href="issued-books.php"><i class="fa fa-recycle fa-5x"></i>




<?php 
$sid=$_SESSION['stdid'];
$sql1 ="SELECT id from tblissuedbookdetails where StudentID=:sid";
$query1 = $dbh -> prepare($sql1);
$query1->bindParam(':sid',$sid,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$issuedbooks=$query1->rowCount();
?>
                            <h3><?php echo htmlentities($issuedbooks);?></h3>
                          Borrowed/Returned Books 
                        </div>

<!--<div>
<table>
 <tr>
 <th colspan="3"><center>Expiration Guidelines</center></th>
</tr>
  <tr>
    <td>1-2 days</td>
    <td>50 Pesos </td>
   
  </tr>
  <tr>
    <td>3-4 days</td>
    <td>100 pesos</td>
   
  </tr>
  <tr>
    <td>1 week</td>
    <td>120 pesos</td>
    
  </tr>
  <tr>
    <td>1 month</td>
    <td>500 pesos</td>
    
  </tr>
  <tr>
    <td>1 year</td>
    <td>1000 pesos</td>
    
  </tr>
 
  
    
  
</table>

                    </div>!-->    
        </div>


<br>
		     
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
