<?php include('_header.php');?>
<?php 
	if (checkAuth(true) != "") {
?>

<div class="page">
<div class="container-fluid">
				
	<div class="row">
			<div class="well beer">
		
				<div  style="width: 75%;">
				<h1>Add Book</h1>

					<form method="post" action='book_receive.php' class="inform">
						<div class="form-group">
					
							<label>ISBN:</label>
							<input type="text" name ="isbn" class="form-control">
						</div>

						<div class="form-group">
							<label>Name:</label>
							<input type="text" name ="name"  class="form-control">
						</div>
					
						<div class="form-group">	
							<label>Author:</label>
							<input type="text" name ="author"  class="form-control">
						</div>
					
						<div class="form-group">	
							<label>Publisher:</label>
							<input type="text" name ="publisher"  class="form-control">
						</div>	
						
						<div class="form-group">	
							<label>Edition:</label>
							<input type="text" name ="edition"  class="form-control">
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