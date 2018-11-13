<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('add-book2.php');
// not logged in 

if(strlen($_SESSION['alogin'])==0)
{   
	header('location:index.php');
}
else	//if logged in properly
{ 

	
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
<<<<<<< HEAD
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/saveUserInformation.js"></script>

=======
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	
>>>>>>> b7f94eb789aa1c7e096c27394f8e9af8e26362e2
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
<<<<<<< HEAD
<form method="POST"  enctype="multipart/form-data" id="myform" onsubmit="return false">
=======
<form method="POST" action="add-book.php" enctype="multipart/form-data" role ="form">
>>>>>>> b7f94eb789aa1c7e096c27394f8e9af8e26362e2

<div class="form-group"> 
<label>ISBN/ISSN Number 		<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="ISBN/ISSN Number" type="text"  name="txtISBN" id="txtISBN"  	autocomplete="off" form="myform" 	required  />
</div>

<div class="form-group">
<label>Barcode					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Barcode" type="text" name="txtBarcode" id="txtBarcode"	autocomplete="off" form="myform" required />
</div>

<div class="form-group">
<label>Callnumber				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Callnumber" type="text"  name="txtCallnumber" id="txtCallnumber" autocomplete="off" form="myform" required />
</div>

<div class="form-group">
<label>Title					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Title" type="text" name="txtBookTitle" id="txtBookTitle"  autocomplete="off" form="myform" required />
</div>

<div class="form-group">
<label>Subtitle					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Subtitle" type="text" name="txtSubtitle" id="txtSubtitle"	autocomplete="off" form="myform"	required />
</div>

<div class="form-group">

<label>Author<span style="color:red;">*</span>	</label>
<table class="table table-bordered" id="dynamic_field">
	<tr>

    <td>
<<<<<<< HEAD
    <input type="text" name="name[]" placeholder="Enter Author" id="txtAuthor" form="myform" class="form-control name_list" /></td>
	<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
=======
    <input type="text" name="Author[]" placeholder="Enter Author" class="form-control name_list" /></td>
	<td><button type="button" name="adding" id="adding" class="btn btn-success">Add More</button></td>
>>>>>>> b7f94eb789aa1c7e096c27394f8e9af8e26362e2
	</tr>
	</table>

	</div>


<div class="form-group">
<label>Edition					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Edition" type="text" name="txtEdition" form="myform" id="txtEdition" 	autocomplete="off"  required />
</div>

<div class="form-group">
<label>Publisher				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Publisher" type="text" name="txtPublisher" form="myform" id="txtPublisher"	autocomplete="off"  required />
</div>

<div class="form-group">
<label>Copyright				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Copyright" type="text" name="txtCopyright" form="myform" id="txtCopyright" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Physical Description 	<span style="color:red;">*</span>	</label>
<textarea class="form-control"  type="comment" name="txtDescription" id="txtDescription" form="myform" autocomplete="off" required /> 
</textarea>
</div>

<div class="form-group">
<label>Series				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Series" type="text" id="txtSeries" form="myform" name="txtSeries" 			autocomplete="off"  required />
</div>

<div class="form-group">
<<<<<<< HEAD
<label>Subject					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Subject1" type="text" name="txtSubject1" form="myform" id="txtSubject1"	autocomplete="off"  required /> <br>
<input class="form-control" placeholder="Subject2" type="text" name="txtSubject2" form="myform" id="txtSubject2" 	autocomplete="off"   /> <br>
<input class="form-control" placeholder="Subject3" type="text" name="txtSubject3" form="myform" id="txtSubject3"	autocomplete="off"   /> <br>
<input class="form-control" placeholder="Subject4" type="text" name="txtSubject4" form="myform" id="txtSubject4"	autocomplete="off"   />
=======
<label>Subject <span style="color:red;">*</span></label>
<input class="form-control" placeholder="Subject1" type="text" name="txtSubject1" 	autocomplete="off"  required /> <br>
<input class="form-control" placeholder="Subject2" type="text" name="txtSubject2" 	autocomplete="off"   /> <br>
<input class="form-control" placeholder="Subject3" type="text" name="txtSubject3" 	autocomplete="off"   /> <br>
<input class="form-control" placeholder="Subject4" type="text" name="txtSubject4" 	autocomplete="off"   />
>>>>>>> b7f94eb789aa1c7e096c27394f8e9af8e26362e2
<br>
<div id="wrapper">
<div id="field_div">
<input type="button" value="Add Subject" onclick="add_field();">
</div>
</div>
</div>

<div class="form-group">
<label>Location 				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Location" type="text" name="txtLocation" form="myform" id="txtLocation"	autocomplete="off"  required />
</div>

<div class="form-group">
<label>Material Type			<span style="color:red;">*</span>	</label>
<select class="form-control"  			name="txtType" 	form="myform" id="txtType"		required >
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

<<<<<<< HEAD
<button type="submit" name="adding" id ="adding" class="button"><span>Add </span></button>
=======
<button type="submit" name="addbooks" class="button">Add </button>
>>>>>>> b7f94eb789aa1c7e096c27394f8e9af8e26362e2

</form>
                            </div>
                        </div>
                            </div>

        </div>
   
</div>
<<<<<<< HEAD



=======
<script>
$(document).ready(function(){
	var i=1;
	$('#adding').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="Author[]" placeholder="Enter Author" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});	
});
</script>
>>>>>>> b7f94eb789aa1c7e096c27394f8e9af8e26362e2


<!--Footer-->
<?php include('includes/footer.php');?>

<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
<?php } ?>
