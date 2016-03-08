<?php include("_header.php");?>
<?php 
	if (checkAuth(true) != "") {
?>


<?php
$book_in_main = "";
$query = $mysqli->prepare("select isbn from books where isbn =?");
$query->bind_param("i",$isbn);
if($query->execute()){
	if($query->fetch()){
		$stmt = $mysqli->prepare("insert into user_has_book(user_iduser,book_isbn13,location) values(?,?,?)");
		$isbn = htmlspecialchars($_REQUEST["isbn1"]);
		$location = htmlspecialchars($_REQUEST["location"]);
		$uid = htmlspecialchars($_SESSION["uid"]);
		$stmt->bind_param("iis", $uid, $isbn, $location);
		$stmt->execute();
		$stmt->close();
		$query->close();
		$book_in_main = "FALSE";
		
	}
}

if($book_in_main == ""){
		$stmt = $mysqli->prepare("insert into books(isbn,title,authors,publisher,pagecount) values(?,?,?,?,?)");
		$isbn = htmlspecialchars($_REQUEST["isbn1"]);
		$title = htmlspecialchars($_REQUEST["title"]);
		$authors = htmlspecialchars($_REQUEST["authors"]);
		$publisher = htmlspecialchars($_REQUEST["publisher"]);
		$pageCount = htmlspecialchars($_REQUEST["pageCount"]);
		$stmt->bind_param("isssi", $isbn, $title, $authors, $publisher, $pageCount);
		$stmt->execute();
		$stmt->close();
	

	
		$stmt = $mysqli->prepare("insert into user_has_book(user_iduser,book_isbn13,location) values(?,?,?)");
		$uid = htmlspecialchars($_SESSION["uid"]);
		$location = htmlspecialchars($_REQUEST["location"]);
		$stmt->bind_param("iis", $uid, $isbn, $location);
		$stmt->execute();
		$stmt->close();
	
}else{
	printf("Error: %s\n", $mysqli->error);
}	

?>










<script>location.replace("http://web.engr.oregonstate.edu/~grantch/test/view_books.php")</script>












<?php } ?>
<?php include("_footer.php");?>