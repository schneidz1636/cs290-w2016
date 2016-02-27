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
​
​
<div class="container">
	<h1>Add Book</h1>
		<div class="row">
			<div class="col-lg-6">
				<div class="well" background color="f8f8f8">
					<form method="post" action='book_receive.php' class="inform">
						<ul class="list-group">
​
							<li class="list-group-item"><label>ISBN:</label> <input type="text" name ="isbn" value=<?php echo $identifier;?> disabled>
							<li class="list-group-item"><label>Title:</label> <input type="text" name ="name" value="<?php echo $title;?>">
							<li class="list-group-item"><label>Author:</label> <input type="text" name ="author" value="<?php echo $authors;?>">
							<li class="list-group-item"><label>Publisher:</label> <input type="text" name ="publisher" value="<?php echo $publisher;?>">
							<li class="list-group-item"><label>Page count:</label> <input type="text" name ="pageCount" value="<?php echo $pageCount;?>">
							<li class="list-group-item"><label>Location:</label> <input type="text" name ="location">
							<li class="list-group-item"><input type=submit>
							
						</ul>
					</form>
				</div>
			</div>
		</div>
</div>
​
<?php } ?>
<?php include("_footer.php");?>