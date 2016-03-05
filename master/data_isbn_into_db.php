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


<div class="container-fluid">
	<h1>Add Book</h1>
		<div class="row">
			<div class="col-lg-6">
				<div class="well">
					<form method="post" action='book_receive.php' class="inform">

						<div class="form-group">
							<label for="isbn">ISBN:</label>
							<input type="text" class="form-control" name ="isbn" value="<?php echo $identifier;?>" disabled>
							<input type="hidden" name="isbn1"  value="<?php echo $identifier;?>" >
						</div>
						
						<div class="form-group">
							<label>Title:</label>
							<input type="text"  class="form-control" name ="title" value="<?php echo $title;?>">
						</div>
						
						<div class="form-group">
							<label>Author:</label>
							<input type="text"  class="form-control" name ="authors" value="<?php echo $authors;?>">
						</div>
						
						<div class="form-group">
							<label>Publisher:</label>
							<input type="text"  class="form-control" name ="publisher" value="<?php echo $publisher;?>">
						</div>
						
						<div class="form-group">
							<label>Page count:</label>
							<input type="text"  class="form-control" name ="pageCount" value="<?php echo $pageCount;?>">
						</div>
						
						<div class="form-group">
							<label>Location:</label>
							<input type="text"  class="form-control" name ="location">
						</div>
							
							<button type="submit" class="btn btn-default" name="submit">Add Book</button>

					</form>
				</div>
			</div>
		</div>
</div>

<?php } ?>
<?php include("_footer.php");?>