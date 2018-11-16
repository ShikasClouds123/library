<?php
session_start();
include 'includes/config.php';

if(isset($_POST['addbooks'])) {	

	$number = count(array_filter($_POST["Author"])); 

	if($number < 1)
	{ 
		return;
	}

	//Values
	$ISBN				=	$_POST['txtISBN'];
	$Barcode			=	$_POST['txtBarcode'];
	$Callnumber			=	$_POST['txtCallnumber'];
	$Title				=	$_POST['txtBookTitle'];
	$Subtitle			=	$_POST['txtSubtitle'];
	$NameOfAuthor       =   htmlspecialchars(join(",\n",$_POST['Author']));
	$Edition			=	$_POST['txtEdition'];
	$Publisher			=	$_POST['txtPublisher'];
	$Copyright			=	$_POST['txtCopyright'];
	$PhysicalDesc		=	$_POST['txtDescription'];
	$Series				=	$_POST['txtSeries'];
	$Subject1			=	$_POST['txtSubject1'];
	$Subject2			=	$_POST['txtSubject2'];
	$Subject3			=	$_POST['txtSubject3'];
	$Subject4			=	$_POST['txtSubject4'];
	$Location			=	$_POST['txtLocation'];
	$Type				=	$_POST['txtType'];

	$sql="INSERT INTO librarybooks(ISBN,Barcode,Callnumber,Title,Subtitle,Author,
		Edition,Publisher,Copyright,Physicaldesc,Series,Subject_1,Subject_2,Subject_3,
		Subject_4,Location,Material,Status) VALUES(:ISBN,:Barcode,:Callnumber,:Title,:Subtitle,:Author,
		:Edition,:Publisher,:Copyright,:Physicaldesc,:Series,:Subject_1,:Subject_2 ,:Subject_3, 
		:Subject_4,:Location,:Material,'I')";

	$query = $dbh->prepare($sql);
	
	$query->bindParam(':ISBN'			 ,	$ISBN,			 PDO::PARAM_STR);
	$query->bindParam(':Barcode'		 ,	$Barcode,		 PDO::PARAM_STR);
	$query->bindParam(':Callnumber'		 ,	$Callnumber,	 PDO::PARAM_STR);
	$query->bindParam(':Title'			 ,	$Title,	 	 	 PDO::PARAM_STR);
	$query->bindParam(':Subtitle'	 	 ,	$Subtitle,	 	 PDO::PARAM_STR);
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
	$query->bindParam(':Author'	 	 	 ,	$NameOfAuthor,	 PDO::PARAM_STR);

	$query->execute();

	return;
}