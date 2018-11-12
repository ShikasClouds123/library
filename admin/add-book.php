<?php
session_start();
error_reporting(0);
include('includes/config.php');

// not logged in 

if(strlen($_SESSION['alogin'])==0)
{   
	header('location:index.php');
}
else	//if logged in properly
{ 

	if(isset($_POST['adding']))
	{	
	//Values
	$ISBN				=	$_POST['txtISBN'];
	$Barcode			=	$_POST['txtBarcode'];
	$Callnumber			=	$_POST['txtCallnumber'];
	$Title				=	$_POST['txtBookTitle'];
	$Subtitle			=	$_POST['txtSubtitle'];
	$number             =   count($_POST["name"]);
	//$Author				=	$_POST['txtAuthor'];
	$Edition			=	$_POST['txtEdition'];
	$Publisher			=	$_POST['txtPublisher'];
	$Copyright			=	$_POST['txtCopyright'];
	$PhysicalDesc		=	$_POST['txtDescription'];
	$Series				=	$_POST['txtSeries'];
	$Subject1			=	$_POST['id'];
	$Subject2			=	$_POST['txtSubject2'];
	$Subject3			=	$_POST['txtSubject3'];
	$Subject4			=	$_POST['txtSubject4'];
	$Location			=	$_POST['txtLocation'];
	$Type				=	$_POST['txtType'];
	$number             =   count($_POST["name"]); 
if($number > 1)
{
	
		if(trim($_POST["name"]!= ''))
		{
	

	$sql="INSERT INTO librarybooks(ISBN,Barcode,Callnumber,Title,Subtitle,tbl_name(name),
		Edition,Publisher,Copyright,Physicaldesc,Series,Subject_1,Subject_2,Subject_3,
		Subject_4,Location,Material,Status) VALUES(:ISBN,:Barcode,:Callnumber,:Title,:Subtitle,'". $name ."',
		:Edition,:Publisher,:Copyright,:Physicaldesc,:Series,:Subject_1,:Subject_2 ,:Subject_3, 
		:Subject_4,:Location,:Material,'I')";

	$query = $dbh->prepare($sql);

	$query->bindParam(':ISBN'			 ,	$ISBN,			 PDO::PARAM_STR);
	$query->bindParam(':Barcode'		 ,	$Barcode,		 PDO::PARAM_STR);
	$query->bindParam(':Callnumber'		 ,	$Callnumber,	 PDO::PARAM_STR);
	$query->bindParam(':Title'			 ,	$Title,	 	 	 PDO::PARAM_STR);
	$query->bindParam(':Subtitle'	 	 ,	$Subtitle,	 	 PDO::PARAM_STR);
	$query->bindParam(':Author'			 ,	$Author,	 	 PDO::PARAM_STR);
	$query->bindParam(':Edition'		 ,	$Edition,	 	 PDO::PARAM_STR);
	$query->bindParam(':Publisher'		 ,	$Publisher,		 PDO::PARAM_STR);
	$query->bindParam(':Copyright'		 ,	$Copyright,		 PDO::PARAM_STR);
	$query->bindParam(':Physicaldesc' 	 ,	$PhysicalDesc,	 PDO::PARAM_STR);
	$query->bindParam(':Series'	 		 ,	$Series,	 	 PDO::PARAM_STR);
	$query->bindParam(':Subject_1'	 	 ,	$Subject1,	 	 PDO::PARAM_STR);
	$query->bindParam(':Subject_2'	 	 ,	$Subject2,	 	 PDO::PARAM_STR);
	$query->bindParam(':Subject_3'	 	 ,	$Subject3,	 	 PDO::PARAM_STR);
	$query->bindParam(':Subject_4'	 	 ,	$Subject4,		 PDO::PARAM_STR);
	$query->bindParam(':Location'	 	 ,	$Location,	 	 PDO::PARAM_STR);
	$query->bindParam(':Material'	 	 ,	$Type,			 PDO::PARAM_STR);
	$query->bindParam('". $name ."'	 	 ,	$number ,			 PDO::PARAM_STR);
	}
	echo "Data Inserted";
}
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();

			if($lastInsertId)
			{
				$_SESSION['msg']="Book Listed successfully";
				//header('location:manage-books.php');
			}
			else 
			{
				$_SESSION['error']="Something went wrong. Please try again";
				//header('location:manage-books.php');
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
<title>Online Library Management System | Add Book</title>
	<link href="assets/css/bootstrap10.css" rel="stylesheet" />
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/css/style6.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link href="assets/css/animate.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
                <h4 class="header-line">Add Title</h4>
            </div>
		</div>
		
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-heading">
Title
</div>

<div class="panel-body">
<form method="POST" action="add-book-new.php" enctype="multipart/form-data" role ="form">

<div class="form-group">
<label>ISBN/ISSN Number 		<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="ISBN/ISSN Number" type="text"  name="txtISBN"  	autocomplete="off" 	required  />
</div>

<div class="form-group">
<label>Barcode					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Barcode" type="text" name="txtBarcode" 	autocomplete="off"  required />
</div>

<div class="form-group">
<label>Callnumber				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Callnumber" type="text" name="txtCallnumber" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Title					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Title" type="text" name="txtBookTitle" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Subtitle					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Subtitle" type="text" name="txtSubtitle"	autocomplete="off"	required />
</div>

<div class="form-group">

<label>Author<span style="color:red;">*</span>	</label>
<table class="table table-bordered" id="dynamic_field">
	<tr>
	<form name="add_name" id="add_name">
    <td>
    <input type="text" name="name[]" placeholder="Enter Author" class="form-control name_list" /></td>
	<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
	</tr>
	</table>
	</form>
	</div>


<div class="form-group">
<label>Edition					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Edition" type="text" name="txtEdition" 	autocomplete="off"  required />
</div>

<div class="form-group">
<label>Publisher				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Publisher" type="text" name="txtPublisher"	autocomplete="off"  required />
</div>

<div class="form-group">
<label>Copyright				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Copyright" type="text" name="txtCopyright" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Physical Description 	<span style="color:red;">*</span>	</label>
<textarea class="form-control"  type="comment" name="txtDescription" autocomplete="off" required /> 
</textarea>
</div>

<div class="form-group">
<label>Series				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Series" type="text"  name="txtSeries" 			autocomplete="off"  required />
</div>

<div class="form-group">
<label>Subject					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Subject1" type="text" name="txtSubject1" 	autocomplete="off"  required /> <br>
<input class="form-control" placeholder="Subject2" type="text" name="txtSubject2" 	autocomplete="off"   /> <br>
<input class="form-control" placeholder="Subject3" type="text" name="txtSubject3" 	autocomplete="off"   /> <br>
<input class="form-control" placeholder="Subject4" type="text" name="txtSubject4" 	autocomplete="off"   />
<br>
<div id="wrapper">
<div id="field_div">
<input type="button" value="Add Subject" onclick="add_field();">
</div>
</div>
</div>

<div class="form-group">
<label>Location 				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Location" type="text" name="txtLocation" 	autocomplete="off"  required />
</div>

<div class="form-group">
<label>Material Type			<span style="color:red;">*</span>	</label>
<select class="form-control"  			name="txtType" 							required >
<option value="">Select Type</option>
<?php 
$sql = "SELECT * from  material";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->Type);?>">
<?php echo htmlentities($result->Type);?></option>
 <?php }} ?> 
</select>
</div>

<button type="submit" name= "adding" id = "adding" class="button"><span>Add </span></button>

</form>
                            </div>
                        </div>
                            </div>

        </div>
   
</div>
<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter Author" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#adding').click(function(){		
		$.ajax({
			url:"index.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
	});
	
});
</script>


<!--Footer-->
<?php include('includes/footer.php');?>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
<?php } ?>
