<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{   
	header('location:index.php');
}
else
{ 
	
	if(isset($_POST['issue']))
	{
	$studentid=strtoupper($_POST['studentid']);
	$bookid=$_POST['Barcode'];
	$InsertBookID = $bookid;
	$new_date = date('Y-m-d', strtotime($_POST['expDate']));
	$getdate = $_POST['expDate'];
		
	$sql="INSERT INTO  tblissuedbookdetails(StudentID,BookId,expirationDate) VALUES(:studentid,'$InsertBookID','$getdate'); 
		  UPDATE librarybooks
		  SET `Status` = 'O'
		  WHERE `Barcode` = :bookid;";
	
	$query = $dbh->prepare($sql);
	$query->bindParam(':studentid',$studentid,PDO::PARAM_STR);
	$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
{
$_SESSION['msg']="Book issued successfully";
header('location:manage-issued-books.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-issued-books.php');
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
    <title>Online Library Management System | Issue a new Book</title>
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





<script>
function getstudent() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_student.php",
data:'studentid='+$("#studentid").val(),
type: "POST",
success:function(data){
$("#get_student_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

//function for book details
function getbook() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_book.php",
data:'Barcode=' + $("#Barcode").val(),
type: "POST",
success:function(data){
$("#get_book_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}


</script> 
<style type="text/css">
  .others{
    color:red;
}

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


</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="panel-heading">
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Issue a New Book</h4>
                
                            </div>

</div>



<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1"">
<div class="panel panel-info">
<div class="panel-heading">
Issue a New Book
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Student ID<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="studentid" id="studentid" onBlur="getstudent()" autocomplete="off"  required />
</div>

<div class="form-group">
<span id="get_student_name" style="font-size:16px;"></span> 
</div>





<div class="form-group">
<label>Barcode<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="Barcode" id="Barcode" onBlur="getbook()"  required="required" />
</div>

 <div class="form-group">

<select  class="form-control" name="bookdetails" id="get_book_name" readonly>  </select>
<label>Due Date<span style="color:red;">*</span></label>
<br>
<input type="date" id="expDate" name="expDate">





 </div>
 
        <script>
function myFunction() {
  alert("Book Added Successfully");
}
</script>
 
<button type="submit" name="issue" id="submit" class="button" button onclick="myFunction()"><span>Issue Book</span></button>

                                    </form>
									                            </div>
</div>
</div>
									<!-- List of Available Books -->
<div class="row">
                <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading">
                           List of Available books 
                </div>
                          
                            <div class="table-responsive">
                              <div class="panel-body" style="overflow:scroll;" >
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
											<th>Place of Publication</th>
                      <th>Copyright</th>
                      <th>Physical Description</th>
											<th>Series</th> 
											<th>Subject</th>   
											<th>Location</th>
											<th>Material</th>
									 </thead>
                                    <tbody>

<?php $sql = "SELECT * FROM librarybooks WHERE Status = 'I'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
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
                      <td class="center"><?php echo htmlentities($result->Placeofpublication);?></td>
											<td class="center"><?php echo htmlentities($result->Copyright);?></td>
											<td class="center"><?php echo htmlentities($result->Physicaldesc);?></td>
											<td class="center"><?php echo htmlentities($result->Series);?></td>
											<td class="center"><?php echo htmlentities($result->Subject_1);?></td>
											<td class="center"><?php echo htmlentities($result->Location);?></td>
											<td class="center"><?php echo htmlentities($result->Material);?></td>

                                                                                     
											</td>
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>

                            
                        </div>
                    </div>

                    <!--Table for available books -->
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
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>








</body>
</html>
<?php } ?>
