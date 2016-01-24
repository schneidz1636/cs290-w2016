<?php
session_start();
session_destroy();

require_once("header.php");
?>

<div class="container">
	<h1>Success!</h1>
	<p>You have been successfully logged out!</p>
</div>

<?php
require_once("footer.php");
?>