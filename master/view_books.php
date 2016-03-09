<?php include '_header.php' ?>

<?php 
	if (checkAuth(true) != "") {
?>

<h1>My Books</h1>

<?php
$time_start = microtime(true);
echo "<table class='table table-striped'><tr><th>ISBN<th>Title<th>Author<th>Publisher<th>Page count<th>Location<th>More Info</tr>";
$uid = $_SESSION['uid'];
if($result = $mysqli->query("SELECT * FROM `user_has_book` JOIN `books` on user_has_book.book_isbn13=books.isbn WHERE user_iduser =".$uid)){
	while($obj = $result->fetch_object()){
		echo "<tr>";
		echo "<td>".htmlspecialchars($obj->isbn)."</td>";
		echo "<td>".htmlspecialchars($obj->title)."</td>";
		echo "<td>".htmlspecialchars($obj->authors)."</td>";
		echo "<td>".htmlspecialchars($obj->publisher)."</td>";
		echo "<td>".htmlspecialchars($obj->pagecount)."</td>";
		echo "<td>".htmlspecialchars($obj->location)."</td>";	
		echo "<td><a href=http://web.engr.oregonstate.edu/~grantch/test/book_info.php?q=".htmlspecialchars($obj->isbn).">More Info</a></td>";
		}
		
		$result->close();
}
echo "</table>";
$time_end = microtime(true);
$extime = ($time_end - $time_start);
echo '<b>Time: </b>'.$extime.'<b> sec</b>';

?>

<?php } ?>
<?php include '_footer.php' ?>