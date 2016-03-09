<?php
session_start();
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","grantch-db","rVrkAizgwSrdVJlU","grantch-db");
require_once("http_response_code.php");

if (!isset($_REQUEST["offset"])) {
	http_response_code(400);
} else if (!isset($_SESSION["uid"])) {
	http_response_code(401);
} else {
	$query = "select isbn,title,authors,publisher,pagecount from books LIMIT 20 OFFSET ". htmlspecialchars($_REQUEST["offset"]);
	if($result = $mysqli->query($query)){
		while($obj = $result->fetch_object()){
			echo "<tr>";
			echo "<td>".htmlspecialchars($obj->isbn)."</td>";
			echo "<td>".htmlspecialchars($obj->title)."</td>";
			echo "<td>".htmlspecialchars($obj->authors)."</td>";
			echo "<td>".htmlspecialchars($obj->publisher)."</td>";
			echo "<td>".htmlspecialchars($obj->pagecount)."</td>";
			echo "</tr>";
		}
		
		$result->close();
	} else {
		echo "<tr><td>Something went wrong. I'm sorry.</td></tr>";
	}
}
?>