
<?php include("_header.php");?>

	<div class="panel panel-default">
		
		<div class="panel-heading">Add a Book!</dv>
			
			<div class="panel-body">
				
				<div class="container">
					
					<h2>Add A book to your inventory!</h2>
					
					<form class="form-inline" role="form" method="post" action='bookOutout.php'>
					
						<div class="form-group">
							
							<label for="isbn">ISBN Number:</label>
							<input type="text" class="form-control" name="isbntmp" id="isbn_tmp" placeholder="Enter ISBN Number" size="14">
							<button type="submit" class="btn btn-default">Submit</button>
							
						</div>
					</form>
					
				</div>
				
			</div>
		
		
		
		</div>
	
	</div>
	
<?php include("_footer.php");?>