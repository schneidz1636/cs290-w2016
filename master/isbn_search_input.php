<?php include("_header.php");?>
<?php 
	if (checkAuth(true) != "") {
?>

<h1>look up book</h1>
<form method="post" action='isbn_search_test.php' class="inform">
<ul>
<li><label>ISBN:</label> <input type="text" name="isbn_temp">
<li><input type=submit>
</ul>
</form>

<?php } ?>
<?php include("_footer.php");?>