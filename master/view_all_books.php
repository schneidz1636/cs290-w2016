<?php include '_header.php' ?>

<?php 
	if (checkAuth(true) != "") {
?>

<div class="page">
<div class="well" style="margin-bottom: 0;">
<h1>Site Inventory</h1>

<?php

echo "<table class='table table-striped' id='posts_table'><tr><th>ISBN<th>Title<th>Author<th>Publisher<th>Page count<th>More Info</tr>";
if($result = $mysqli->query("select isbn,title,authors,publisher,pagecount from books limit 20")){
	while($obj = $result->fetch_object()){
		echo "<tr>";
		echo "<td>".htmlspecialchars($obj->isbn)."</td>";
		echo "<td>".htmlspecialchars($obj->title)."</td>";
		echo "<td>".htmlspecialchars($obj->authors)."</td>";
		echo "<td>".htmlspecialchars($obj->publisher)."</td>";
		echo "<td>".htmlspecialchars($obj->pagecount)."</td>";
		echo "<td><a href='book_info_2.php?q=".htmlspecialchars($obj->isbn)."'>More Info</a></td>";
		echo "</tr>";
	}
	
	$result->close();
}
echo "</table>";
echo "<div id='no-more-books' style='display: none;'><h3>No more books.</h3></div>";
echo "<span style='display: none;' id='offset'>20</span>";

?>


</div>
</div>
<script type="text/javascript">
$(window).scroll(function() {
    if ($(window).scrollTop() == $(document).height() - $(window).height()) {
		console.log("BOTTOM REACHED");
		console.log("offset: " + $("#offset").text())
		
        $.ajax({
        url: "load_more_books.php",
		data: {offset: $("#offset").text()},
        success: function(html, textStatus, jqXHR) {
            if (html) {
				$("#offset").text(+$("#offset").text() + 20);
                $("#posts_table").append(html);
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