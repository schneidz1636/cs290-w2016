<?php include('_header.php');?>
<?php 
	if (checkAuth(true) != "") {
?>	


<div class="page">
<div class="container-fluid">
				
	<div class="row">
			<div class="well" style="margin-bottom: 0;">
		
				<div  style="width: 75%;">
					<h3 class="error">* ISBN not found</h1>
					<h1>Add Book</h1>

					<form method="post" action='book_receive.php' class="inform">
						<div class="form-group">
					
							<label>ISBN:</label>
							<input type="text" name ="isbn1" class="form-control" value="<?php echo $_GET["isbn_temp"] ?>">
						</div>

						<div class="form-group">
							<label>Title:</label>
							<input type="text" name ="title"  class="form-control">
						</div>
					
						<div class="form-group">	
							<label>Author:</label>
							<input type="text" name ="authors"  class="form-control">
						</div>
					
						<div class="form-group">	
							<label>Publisher:</label>
							<input type="text" name ="publisher"  class="form-control">
						</div>	
						
						<div class="form-group">	
							<label>Page Count:</label>
							<input type="text" name ="pageCount"  class="form-control">
						</div>	
						
						<div class="form-group">	
							<label>Location:</label>
							<input type="text" name ="location"  class="form-control">
						</div>
					
						<button type="submit" class="btn btn-default" name="submit">Add book</button>
											
					</form>
				</div>
			</div>
	</div>
</div>
</div>

<?php } ?>
<?php include("_footer.php");?>