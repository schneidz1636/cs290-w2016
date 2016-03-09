<?php include '_header.php' ?>

<?php 
	if (checkAuth(true) != "") {
?>

<div class="page">
<div class="well" style="margin-bottom:0;">
<h1>My Books</h1>

<?php
$time_start = microtime(true);
echo "<table class='table table-striped' id='my_books_table'><tr><th>ISBN<th>Title<th>Author<th>Publisher<th>Page count<th>Location<th>More Info</tr>";
$uid = $_SESSION['uid'];
if($result = $mysqli->query("SELECT * FROM `user_has_book` JOIN `books` on user_has_book.book_isbn13=books.isbn WHERE user_iduser =".$uid." LIMIT 20")){
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
}
echo "</table>";
$time_end = microtime(true);
$extime = ($time_end - $time_start);
echo "<div id='no-more-books' style='display: none;'><h3>No more books.</h3></div>";
echo '<b>Time: </b>'.$extime.'<b> sec</b>';
echo "<span style='display: none;' id='offset'>20</span>";

?>

</div>
</div>
=======
<script type="text/javascript">
$(window).scroll(function() {
    if ($(window).scrollTop() == $(document).height() - $(window).height()) {
		console.log("BOTTOM REACHED");
		console.log("offset: " + $("#offset").text())
		
        $.ajax({
        url: "load_more_books_2.php",
		data: {offset: $("#offset").text()},
        success: function(html, textStatus, jqXHR) {
            if (html) {
				$("#offset").text(+$("#offset").text() + 20);
                $("#my_books_table").append(html);
            } else {
				console.log("status: " + textStatus);
				console.log("html: " + html);
				$("#no-more-books").show();				
            }
        },
		error: function(jqXHR, textStatus, errorThrown ) {
			console.error(textStatus + ": " + errorThrown);
		}
        });
    }
});
</script>

<?php } ?>
<?php include '_footer.php' ?>