<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
	require_once("header.php");
?>

<div class="container">
	<form method="post">
		<div class="form-group">
			<label for="name" class="control-label">Name</label>
			<input type="text" name="name" class="form-control" placeholder="Name">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-default">Submit</button>
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
	<p>The location has been successfully added!</p>
</div>
<?php
}
require_once("footer.php");
?>