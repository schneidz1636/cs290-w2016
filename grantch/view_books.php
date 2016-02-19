<?php include '_header.php' ?>

<?php 
	if (checkAuth(true) != "") {
?>

<h1>Books</h1>

<?php

echo "<table class='table table-striped'><tr><th>BID<th>ISBN<th>Name<th>Author<th>Publisher<th>Edition<th>Location</tr>";
if($result = $mysqli->query("select bid,isbn,name,author,publisher,edition,location from books")){
	while($obj = $result->fetch_object()){
		echo "<tr>";
		echo "<td>".htmlspecialchars($obj->bid)."</td>";
		echo "<td>".htmlspecialchars($obj->isbn)."</td>";
		echo "<td>".htmlspecialchars($obj->name)."</td>";
		echo "<td>".htmlspecialchars($obj->author)."</td>";
		echo "<td>".htmlspecialchars($obj->publisher)."</td>";
		echo "<td>".htmlspecialchars($obj->edition)."</td>";
		echo "<td>".htmlspecialchars($obj->location)."</td>";	
		}
		
		$result->close();
}
echo "</table>";

?>

<?php } ?>
<?php include '_footer.php' ?>