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


<div class="container">
	<h1>Add Book</h1>
		<div class="row">
			<div class="col-lg-6">
				<div class="well" background color="f8f8f8">
					<form method="post" action='book_receive.php' class="inform">

						<div class="form-group">
							<label for="isbn">ISBN:
							<input type="text" name ="isbn" value="<?php echo $identifier;?>" disabled>
						</div>
						<div class="form-group">
							<label>Title:
							<input type="text" name ="name" value="<?php echo $title;?>">
						</div>
						<div class="form-group">
							<label>Author:
							<input type="text" name ="author" value="<?php echo $authors;?>">
						</div>
						<div class="form-group">
							<label>Publisher:
							<input type="text" name ="publisher" value="<?php echo $publisher;?>">
						</div>
						<div class="form-group">
							<label>Page count:
							<input type="text" name ="pageCount" value="<?php echo $pageCount;?>">
						</div>
						<div class="form-group">
							<label>Location:
							<input type="text" name ="location">
						</div>
							
							<button type="submit" class="btn btn-default" name="submit">Add Book</button>

					</form>
				</div>
			</div>
		</div>
</div>

<?php } ?>
<?php include("_footer.php");?>