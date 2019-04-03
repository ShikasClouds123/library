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
	$Placeofpublication	=	$_POST['txtPlace'];
	$Copyright			=	$_POST['txtCopyright'];
	$PhysicalDesc		=	$_POST['txtDescription'];
	$Series				=	$_POST['txtSeries'];
	$NameOfSubject       =   htmlspecialchars(join(",\n",$_POST['Subject']));
	$Location			=	$_POST['txtLocation'];
	$Type				=	$_POST['txtType'];

	$sql="INSERT INTO librarybooks(ISBN,Barcode,Callnumber,Title,Subtitle,Author,
		Edition,Publisher,PlaceofPublication,Copyright,Physicaldesc,Series,Subject_1,Location,Material,Status) VALUES(:ISBN,:Barcode,:Callnumber,:Title,:Subtitle,:Author,
		:Edition,:Publisher,:Placeofpublication,:Copyright,:Physicaldesc,:Series,:Subject,:Location,:Material,'I')";

	$query = $dbh->prepare($sql);
	
	$query->bindParam(':ISBN'			 ,	$ISBN,			 PDO::PARAM_STR);
	$query->bindParam(':Barcode'		 ,	$Barcode,		 PDO::PARAM_STR);
	$query->bindParam(':Callnumber'		 ,	$Callnumber,	 PDO::PARAM_STR);
	$query->bindParam(':Title'			 ,	$Title,	 	 	 PDO::PARAM_STR);
	$query->bindParam(':Subtitle'	 	 ,	$Subtitle,	 	 PDO::PARAM_STR);
	$query->bindParam(':Edition'		 ,	$Edition,	 	 PDO::PARAM_STR);
	$query->bindParam(':Publisher'		 ,	$Publisher,		 PDO::PARAM_STR);
	$query->bindParam(':Placeofpublication',$Placeofpublication,PDO::PARAM_STR);
	$query->bindParam(':Copyright'		 ,	$Copyright,		 PDO::PARAM_STR);
	$query->bindParam(':Physicaldesc' 	 ,	$PhysicalDesc,	 PDO::PARAM_STR);
	$query->bindParam(':Series'	 		 ,	$Series,	 	 PDO::PARAM_STR);
	$query->bindParam(':Subject'	 	 ,	$NameOfSubject,	 PDO::PARAM_STR);
	$query->bindParam(':Location'	 	 ,	$Location,	 	 PDO::PARAM_STR);
	$query->bindParam(':Material'	 	 ,	$Type,			 PDO::PARAM_STR);
	$query->bindParam(':Author'	 	 	 ,	$NameOfAuthor,	 PDO::PARAM_STR);

	$query->execute();
	header('location:books-masterlist.php');
	return;
}

else if(isset($_POST['updatebook'])) {	

	$number = count(array_filter($_POST["Author"])); 

	if($number < 1)
	{ 
		return;
	}

	//Values
	$Barcode			=	$_POST['txtBarcode'];
	$ISBN				=	$_POST['txtISBN'];
	$Callnumber			=	$_POST['txtCallnumber'];
	$Title				=	$_POST['txtBookTitle'];
	$Subtitle			=	$_POST['txtSubtitle'];
	$NameOfAuthor       =   htmlspecialchars(join(",\n",$_POST['Author']));
	$Edition			=	$_POST['txtEdition'];
	$Publisher			=	$_POST['txtPublisher'];
	$Placeofpublication	=	$_POST['txtPlace'];
	$Copyright			=	$_POST['txtCopyright'];
	$PhysicalDesc		=	$_POST['txtDescription'];
	$Series				=	$_POST['txtSeries'];
	$NameOfSubject       =   htmlspecialchars(join(",\n",$_POST['Subject']));
	$Location			=	$_POST['txtLocation'];
	$Type				=	$_POST['txtType'];

	$sql='UPDATE librarybooks
		SET ISBN 	= :ISBN,
		Callnumber 	= :Callnumber,
		Title 		= :Title, 
		Subtitle 	= :Subtitle,
		Author 		= :Author,
		Edition 	= :Edition,
		Publisher 	= :Publisher,
		Placeofpublication 	= :Placeofpublication,
		Copyright= :Copyright,
		Physicaldesc= :Physicaldesc,
		Series 		= :Series,
		Subject_1	= :Subject_1,
		Location = :Location,
		Material	= :Material
		WHERE Barcode = :Barcode';

	$query = $dbh->prepare($sql);
	
	$query->bindParam(':ISBN'			 ,	$ISBN,			 PDO::PARAM_STR);
	$query->bindParam(':Barcode'		 ,	$Barcode,		 PDO::PARAM_STR);
	$query->bindParam(':Callnumber'		 ,	$Callnumber,	 PDO::PARAM_STR);
	$query->bindParam(':Title'			 ,	$Title,	 	 	 PDO::PARAM_STR);
	$query->bindParam(':Subtitle'	 	 ,	$Subtitle,	 	 PDO::PARAM_STR);
	$query->bindParam(':Edition'		 ,	$Edition,	 	 PDO::PARAM_STR);
	$query->bindParam(':Publisher'		 ,	$Publisher,		 PDO::PARAM_STR);
	$query->bindParam(':Placeofpublication',$Placeofpublication,PDO::PARAM_STR);
	$query->bindParam(':Copyright'		 ,	$Copyright,		 PDO::PARAM_STR);
	$query->bindParam(':Physicaldesc' 	 ,	$PhysicalDesc,	 PDO::PARAM_STR);
	$query->bindParam(':Series'	 		 ,	$Series,	 	 PDO::PARAM_STR);
	$query->bindParam(':Subject_1'	 	 ,	$NameOfSubject,	 PDO::PARAM_STR);
	$query->bindParam(':Location'	 	 ,	$Location,	 	 PDO::PARAM_STR);
	$query->bindParam(':Material'	 	 ,	$Type,			 PDO::PARAM_STR);
	$query->bindParam(':Author'	 	 	 ,	$NameOfAuthor,	 PDO::PARAM_STR);

	$query->execute();
	header('location:books-masterlist.php');
	return;
}