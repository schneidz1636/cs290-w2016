<?php include("_header.php");?>
<?php 
	if (checkAuth(true) != "") {
?>

<?php

if ($stmt = $mysqli->prepare("insert into books(isbn,title,authors,publisher,pagecount,location) values(?,?,?,?,?,?)")){
	$isbn = htmlspecialchars($_REQUEST["isbn1"]);
	$title = htmlspecialchars($_REQUEST["title"]);
	$authors = htmlspecialchars($_REQUEST["authors"]);
	$publisher = htmlspecialchars($_REQUEST["publisher"]);
	$pageCount = htmlspecialchars($_REQUEST["pageCount"]);
	$location = htmlspecialchars($_REQUEST["location"]);
	
	$stmt->bind_param("isssis", $isbn, $title, $authors, $publisher, $pageCount, $location);
    $stmt->execute();
	$stmt->close();
}else{
	printf("Error: %s\n", $mysqli->error);
}

?>

<script>location.replace("http://web.engr.oregonstate.edu/~grantch/test/view_books.php")</script>

<?php } ?>
<?php include("_footer.php");?>
	







