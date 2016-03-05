<?php include("_header.php");?>
<?php 
	if (checkAuth(true) != "") {
?>

<?php

if ($stmt = $mysqli->prepare("insert into books(isbn,title,authors,publisher,pagecount,location) values(?,?,?,?,?,?)")){
	$isbn = $_REQUEST["isbn1"];
	$title = $_REQUEST["title"];
	$authors = $_REQUEST["authors"];
	$publisher = $_REQUEST["publisher"];
	$pageCount = $_REQUEST["pageCount"];
	$location = $_REQUEST["location"];
	
	$stmt->bind_param("isssis", $isbn, $title, $authors, $publisher, $pageCount, $location);
    $stmt->execute();
	$stmt->close();
}else{
	printf("Error: %s\n", $mysqli->error);
}

?>
<?php } ?>
<?php include("_footer.php");?>
	







