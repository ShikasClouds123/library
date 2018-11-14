$(document).ready(function() {
	$("#adding").click(function() {
	var txtISBN = $("#txtISBN").val();
	var txtBarcode = $("#txtBarcode").val();
	var txtCallnumber = $("#txtCallnumber").val();
	var txtBookTitle = $("#txtBookTitle").val();
	var txtSubtitle = $("#txtSubtitle").val();
	var txtAuthor = $("#txtAuthor").val();
	var txtEdition = $("#txtEdition").val();
	var txtPublisher = $("#txtPublisher").val();
	var txtCopyright = $("#txtCopyright").val();
	var txtDescription = $("#txtDescription").val();
	var txtSeries = $("#txtSeries").val();
	var txtSubject1 = $("#txtSubject1").val();
	var txtSubject2 = $("#txtSubject2").val();
	var txtSubject3 = $("#txtSubject3").val();
	var txtSubject4 = $("#txtSubject4").val();
	var txtLocation = $("#txtLocation").val();
	var txtType = $('#txtType option:selected').text();


$.post("saveData.php", {
	txtISBN1: txtISBN,
	txtBarcode1: txtBarcode,
	txtCallnumber1: txtCallnumber,
	txtBookTitle1: txtBookTitle,
	txtSubtitle1: txtSubtitle,
	txtAuthor1: txtAuthor,
	txtEdition1: txtEdition,
	txtPublisher1: txtPublisher,
	txtCopyright1: txtCopyright,
	txtDescription1: txtDescription,
	txtSeries1: txtSeries,
	txtSubject11: txtSubject1,
	txtSubject21: txtSubject2,
	txtSubject31: txtSubject3,
	txtSubject41: txtSubject4,
	txtLocation1: txtLocation,
	txtType1: txtType,
}, function(data) {
	alert(data);
	$('#myform')[0].reset();
	});

	});
	});
