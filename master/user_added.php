<?php include '_header.php' ?>

<div class="page">
	<div class="well" style="margin-bottom: 0;">
		<h1>User Created</h1>

		<h1>You may now <a href="login.php">log in...</h1>';
		
		<!-- the script below should redirect the user to the login page after 3 seconds if they do not click login-->
		
		<script type="text/javascript">
			(function(){
				setTimeout(function(){
				window.location="login.php";
				},3000); /* 1000 = 1 second*/
		})();
		</script>
		
	</div>
</div>
<?php include '_footer.php' ?>