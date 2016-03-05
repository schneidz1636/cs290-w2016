<?php include '_header.php' ?>

<?php 
	if (checkAuth(true) != "") {
?>

<h1>Books</h1>

<?php
$time_start = microtime(true);
echo "<table class='table table-striped'><tr><th>ISBN<th>Title<th>Author<th>Publisher<th>Page count<th>Location</tr>";
if($result = $mysqli->query("select isbn,title,authors,publisher,pagecount,location from books")){
	while($obj = $result->fetch_object()){
		echo "<tr>";
		echo "<td>".htmlspecialchars($obj->isbn)."</td>";
		echo "<td>".htmlspecialchars($obj->title)."</td>";
		echo "<td>".htmlspecialchars($obj->authors)."</td>";
		echo "<td>".htmlspecialchars($obj->publisher)."</td>";
		echo "<td>".htmlspecialchars($obj->pagecount)."</td>";
		echo "<td>".htmlspecialchars($obj->location)."</td>";	
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