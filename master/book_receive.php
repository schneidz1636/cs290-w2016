<?php include("_header.php");?>
<?php 
	if (checkAuth(true) != "") {
?>

<?php

if ($stmt = $mysqli->prepare("insert into books(bid,isbn,name,author,publisher,edition,location) values(?,?,?,?,?,?,?)")){
	//$bid = $_REQUEST["bid"];
	$isbn = $_REQUEST["isbn"];
	$title = $_REQUEST["title"];
	$author = $_REQUEST["author"];
	$publisher = $_REQUEST["publisher"];
	$pageCount = $_REQUEST["pageCount"];
	$location = $_REQUEST["location"];
	
	$stmt->bind_param("iisssss",$bid, $isbn, $title, $author, $publisher, $pageCount, $location);
    $stmt->execute();
}else{
	printf("Error: %s\n", $mysqli->error);
}

?>

<?php include("_footer.php");?>
	







