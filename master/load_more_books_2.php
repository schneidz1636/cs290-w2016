<?php
session_start();
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","grantch-db","rVrkAizgwSrdVJlU","grantch-db");
require_once("http_response_code.php");

if (!isset($_REQUEST["offset"])) {
	http_response_code(400);
} else if (!isset($_SESSION["uid"])) {
	http_response_code(401);
} else {
	$query = "SELECT * FROM `user_has_book` JOIN `books` on user_has_book.book_isbn13=books.isbn WHERE user_iduser =".htmlspecialchars($_SESSION["uid"])." LIMIT 20 OFFSET ". htmlspecialchars($_REQUEST["offset"]);
	if($result = $mysqli->query($query)){
		while($obj = $result->fetch_object()){
			echo "<tr>";
			echo "<td>".htmlspecialchars($obj->isbn)."</td>";
			echo "<td>".htmlspecialchars($obj->title)."</td>";
			echo "<td>".htmlspecialchars($obj->authors)."</td>";
			echo "<td>".htmlspecialchars($obj->publisher)."</td>";
			echo "<td>".htmlspecialchars($obj->pagecount)."</td>";
			echo "<td>".htmlspecialchars($obj->location)."</td>";
		echo "<td><a href='book_info.php?q=".htmlspecialchars($obj->isbn)."'>More Info</a></td>";
			echo "</tr>";
		}
		
		$result->close();
	} else {
		//echo "<tr><td>Something went wrong. I'm sorry.</td></tr>";
		echo "<tr><td>Something went wrong. I'm sorry.</td><td>Query: '". $query ."'</td></tr>";
	}
}
?>