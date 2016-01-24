<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
	require_once("header.php");
?>

<style>
.vertical-seperator {
	background-color: #eee;
	height: 100%;
}

.col-md-6:not(:first-child) {
	border-left: 1px solid #ccc;
}
</style>

<div class="container">
	<h1>Add Book</h1>
	<hr>
	
	<form method="post" class="form-horizontal">
	
	<div class="row">
		<div class="col-md-12">
			<p>If you have the ISBN number of the book you wish to add, enter it in the field on the left. If you do not have the ISBN number, or the ISBN number is not recognized, enter the book's information manually in the fields on the right.</p>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="isbn" class="col-sm-2 control-label">ISBN #</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="isbn" placeholder="ISBN #">
				</div>
			</div>
		</div>
		<!--<div class="col-md-2 text-center vertical-seperator">
			<h3>~ OR ~</h3>
		</div>-->
		<div class="col-md-6">
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" placeholder="Name">
				</div>
			</div>
			<div class="form-group">
				<label for="author" class="col-sm-2 control-label">Author</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="author" placeholder="Author">
				</div>
			</div>
			<div class="form-group">
				<label for="publisher" class="col-sm-2 control-label">Publisher</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="publisher" placeholder="Publisher">
				</div>
			</div>
			<div class="form-group">
				<label for="summary" class="col-sm-2 control-label">Summary</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="summary" placeholder="Sumary">
				</div>
			</div>
			<div class="form-group">
				<label for="notes" class="col-sm-2 control-label">Notes</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="notes" placeholder="Notes">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<button type="submit" class="btn btn-default">Submit</button>
		</div>
	</div>
	
	</form>
</div>

<?php
	require_once("footer.php");
} else {
	require_once("header.php");
?>
<div class="container">
	<h1>Success!</h1>
	<hr>
	<p>The book has been successfully added!</p>
</div>
<?php
}
require_once("footer.php");
?>