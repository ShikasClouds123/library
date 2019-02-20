<?php
session_start();
error_reporting(0);
include('includes/config.php');
//$connect = mysqli_connect("localhost", "root", "", "library");
include('add-book2.php');
// not logged in 

if(strlen($_SESSION['alogin'])==0)
{   
	header('location:index.php');
}
else	//if logged in properly
{ 
  $sql = 'SELECT * FROM librarybooks WHERE Barcode = :Barcode';
	$query = $dbh->prepare($sql);
  $query->bindParam(':Barcode',$_GET['Barcode'],PDO::PARAM_STR);
  $query->execute();
  $book=$query->fetchAll(PDO::FETCH_ASSOC)[0];
  
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  
  <script>
    let authorInputFieldCount = 1;
    let authorInputFieldLimit = 5;

    function addAuthor(value) {
      if (authorInputFieldCount >= authorInputFieldLimit) {
        return;    
      }

      let dynamicField = document.querySelector('#dynamic_field').getElementsByTagName('tbody')[0];

      let newAuthorField = `
        <tr id="author-${authorInputFieldCount}">
          <td>
            <input type="text" name="Author[]" placeholder="Enter Author" class="form-control name_list" value="${value}"/>
          </td>
          <td>
            <button type="button" onClick="remove(this)" class="btn btn-danger">X</button>
          </td>
        </tr>
      `;

      dynamicField.innerHTML += newAuthorField;
      
      authorInputFieldCount++;
    }

    function remove (target) {
      target.parentNode.parentNode.remove();
      authorInputFieldCount--;
    }



    let subjectInputFieldCount = 1;
    let subjectInputFieldLimit = 5;

    function addSubject(subject) {
      if (subjectInputFieldCount >= subjectInputFieldLimit) {
        return;    
      }

      let dynamicField = document.querySelector('#dynamic_field_subject').getElementsByTagName('tbody')[0];

      let newSubjectField = `
        <tr id="subject-${subjectInputFieldCount}">
          <td>
            <input type="text" name="Subject[]" placeholder="Enter Subject" class="form-control name_list" value="${subject}"/>
          </td>
          <td>
            <button type="button" onClick="removeSubject(this)" class="btn btn-danger">X</button>
          </td>
        </tr>
      `;

      dynamicField.innerHTML += newSubjectField;
      
      subjectInputFieldCount++;
    }

    function removeSubject (target) {
      target.parentNode.parentNode.remove();
      subjectInputFieldCount--;
    }

    document.addEventListener('DOMContentLoaded', () => {
      let authors = `<?php echo $book['Author'] ?>`.split(',\n');
      authors.forEach((author) => {
        addAuthor(author);
      });

      let subjects = `<?php echo $book['Subject_1'] ?>`.split(',\n');
      subjects.forEach((subject) => {
        addSubject(subject);
      });
    });

  </script>
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
                <h4 class="header-line">Update Title</h4>
            </div>
		</div>
		
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-heading">
Title
</div>

<div class="panel-body">
<form method="POST" action="add-book.php" enctype="multipart/form-data" role ="form">

<div class="form-group">
<label>ISBN/ISSN Number 		<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="ISBN/ISSN Number" type="text"  name="txtISBN"  	autocomplete="off" value="<?php echo $book['ISBN'] ?>" 	required  />
</div>

<div class="form-group">
<label>Barcode					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Barcode" type="text" name="txtBarcode" 	autocomplete="off" value="<?php echo $book['Barcode'] ?>" required />
</div>

<div class="form-group">
<label>Callnumber				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Callnumber" type="text" name="txtCallnumber" autocomplete="off" value="<?php echo $book['Callnumber'] ?>" required />
</div>

<div class="form-group">
<label>Title					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Title" type="text" name="txtBookTitle" autocomplete="off" value="<?php echo $book['Title'] ?>" required />
</div>

<div class="form-group">
<label>Subtitle					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Subtitle" type="text" name="txtSubtitle"	autocomplete="off" value="<?php echo $book['Subtitle'] ?>"	required />
</div>

<div class="form-group">
  <label>Author<span style="color:red;">*</span>	</label>
  <table class="table table-bordered" id="dynamic_field">
  	<tr>
    	<td>
        <button type="button" onClick="addAuthor()" class="btn btn-success">Add More</button>
      </td>
	  </tr>
	</table>
</div>


<div class="form-group">
<label>Edition					<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Edition" type="text" name="txtEdition" 	autocomplete="off" value="<?php echo $book['Edition'] ?>" required />
</div>

<div class="form-group">
<label>Publisher				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Publisher" type="text" name="txtPublisher"	autocomplete="off" value="<?php echo $book['Publisher'] ?>" required />
</div>

<div class="form-group">
<label>Copyright				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Copyright" type="text" name="txtCopyright" autocomplete="off" value="<?php echo $book['Copyright'] ?>" required />
</div>

<div class="form-group">
<label>Physical Description 	<span style="color:red;">*</span>	</label>
<textarea class="form-control"  type="comment" name="txtDescription" autocomplete="off" value="<?php echo $book['Description'] ?>" required /> 
</textarea>
</div>

<div class="form-group">
<label>Series				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Series" type="text"  name="txtSeries" 			autocomplete="off" value="<?php echo $book['Series'] ?>" required />
</div>

<div class="form-group">
  <label>Subject<span style="color:red;">*</span>  </label>
  <table class="table table-bordered" id="dynamic_field_subject">
    <tr>
      <td>
        <button type="button" onClick="addSubject()" class="btn btn-success">Add More</button>
      </td>
    </tr>
  </table>
</div>

<div class="form-group">
<label>Location 				<span style="color:red;">*</span>	</label>
<input class="form-control" placeholder="Location" type="text" name="txtLocation" 	autocomplete="off" value="<?php echo $book['Location'] ?>"  required />
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
<option value="<?php echo htmlentities($result->Type);?>" <?php echo $book['Material'] === $result->Type ? 'selected' : '' ?>>
<?php echo htmlentities($result->Type);?></option>
 <?php }} ?> 
</select>
</div>

<button type="submit" name="updatebook" class="button">Update</button>

</form>
                            </div>
                        </div>
                            </div>

        </div>
   
</div>



<!--Footer-->
<?php include('includes/footer.php');?>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
<?php } ?>
