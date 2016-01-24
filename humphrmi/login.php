<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
	require_once("header.php");
?>

<div class="container">
	<form class="form-signin" method="POST">
		<h2 class="form-signin-heading">Please sign in</h2>
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
		<div class="checkbox">
		<label>
			<input type="checkbox" value="remember-me"> Remember me
		</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>

</div> <!-- /container -->

<?php
	require_once("footer.php");
} else {
	session_start();
	
	$_SESSION['email'] = $_POST["email"];
	$_SESSION['logged_in'] = True;
	
	require_once("header.php");
?>	

<div class="container">
	<h1>Login success!</h1>
	<p>Please continue to your <a href="library.php">library</a>.</p>
</div>
	
<?php
	require_once("footer.php");
}
?>