<?php include("_header.php");?>

<div class="container" >

<h1>Welcome Noob!</h1>

<div class="conatainer">

	<div class="row">
	
		<div class="col-lg-6">
		
			<div class="well" background color="#f8f8f8">
				
				<form method="post" action="userAddFormRecive.php">
			
					<div class="form-group">
						
						<!--I want to create code to build the uid to ensure it's uniqe-->
						<label for="uid">User ID Number:
						<input type="text" class="form-control" name="uid" id="uid-1" size="8" placeholder="UID">
						 </label>
					</div>
					
					<div class="form-group">
					
						<label for="name">Name: 
						<input type="text" class="form-control" name="name" id="name-1" placeholder="John C. Doe">
						</label>
						
						
					</div>
					
					<div class="form-group">
						
						<label for="uid">Username: 
						<input type="text" class="form-control" name="username" id="username-1" placeholder="jcdoe">
						 </label>
						 
					</div>
					
					<div class="form-group">
					
						<label for="password">Password:
						<input type="password" class="form-control" name="password" id="password-1" placeholder="abc123">
						</label>
						
					</div>
										
					<div class="form-group">
					
						<label for="email">Email Address: 
						<input type="text" class="form-control" name="email" id="email-1" placeholder="jcdoe@yourmama.com">
						</label>						
						
					</div>
					
					<button type="submit" class="btn btn-default">Create User</button>
									
				</form>
				
			</div>
		
		</div>
		
		<div class="col-lg-6">
			
			<div class="well" background color="#f8f8f8">
			
				<h2>Right Col</h2>
				<p>I'm not really sure what should go here. I was thinking of allowing a picture upload, but would have
				figure that out. Open to suggestions.</p>
			
			</div>
			
			
		
		</div>
	
	</div>

</div>
</div>

<?php include("_footer.php");?>