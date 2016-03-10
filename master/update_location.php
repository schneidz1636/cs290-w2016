<?php include("_header.php");?>
<?php 
	if (checkAuth(true) != "") {
?>	


<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$uid = test_input($_SESSION['uid']);
$location = test_input($_REQUEST["location"]);
$isbn = test_input($_REQUEST["isbn"]);
$query = $mysqli->prepare("UPDATE user_has_book SET location =? WHERE user_iduser =? AND book_ISBN13 =?");
$query->bind_param("sii",$location, $uid, $isbn);
	if ($query->execute()) {
		$query->close();
	}	

?>
<script>location.replace("view_books.php")</script>

<?php } ?>
<?php include("_footer.php");?>