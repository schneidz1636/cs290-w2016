<?php include("_header.php");?>
<?php 
	if (checkAuth(true) != "") {
?>

<div class="container">
	<h1>look up book</h1>
		<div class="row">
			<div class="col-lg-6">
				<div class="well" background color="f8f8f8">
					<form method="post" action='isbn_search_test.php' class="inform">
						<div class="form-group">
							<label for="isbn">ISBN:</label> 
							<input type="text" class="form-control" name="isbn_temp" size="35">
						</div>
						<button type="submit" class="btn btn-default" name="submit">Search</button>
					</form>
				</div>
			</div>
		</div>
</div>

<?php } ?>
<?php include("_footer.php");?>