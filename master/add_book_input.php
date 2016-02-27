<?php include('_header.php');?>
<?php 
	if (checkAuth(true) != "") {
?>

<h1>Add Book</h1>

<form method="post" action='book_receive.php' class="inform">
<ul>
<li><label>BID:</label> <input type="text" name ="bid">
<li><label>ISBN:</label> <input type="text" name ="isbn">
<li><label>Name:</label> <input type="text" name ="name">
<li><label>Author:</label> <input type="text" name ="author">
<li><label>Publisher:</label> <input type="text" name ="publisher">
<li><label>Edition:</label> <input type="text" name ="edition">
<li><label>Location:</label> <input type="text" name ="location">
<li><input type=submit>
</ul>
</form>

<?php } ?>
<?php include("_footer.php");?>