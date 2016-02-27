<?php include('_header.php');?>
<?php 
	if (checkAuth(true) != "") {
?>
<?php
$identifier = htmlspecialchars($_SESSION['isbnTemp']);
$title = htmlspecialchars($_SESSION['titleTemp']);
$authors = htmlspecialchars($_SESSION['authorsTemp']);
//$description = htmlspecialchars($_SESSION['descriptionTemp']);
$publisher = htmlspecialchars($_SESSION['publisherTemp']);
$pageCount = htmlspecialchars($_SESSION['pageCountTemp']);
?>

<h1>Add Book</h1>

<form method="post" action='book_receive.php' class="inform">
<ul>

<li><label>ISBN:</label> <input type="text" name ="isbn" value=<?php echo $identifier;?> disabled>
<li><label>Title:</label> <input type="text" name ="name" value=<?php echo $title;?>>
<li><label>Author:</label> <input type="text" name ="author" value=<?php echo $authors;?>>
<li><label>Publisher:</label> <input type="text" name ="publisher" value=<?php echo $publisher;?>>
<li><label>Page count:</label> <input type="text" name ="pageCount" value=<?php echo $pageCount;?>>
<li><label>Location:</label> <input type="text" name ="location">
<li><input type=submit>
</ul>
</form>

<?php } ?>
<?php include("_footer.php");?>