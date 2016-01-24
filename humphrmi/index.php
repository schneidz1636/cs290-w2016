<?php
require_once("header.php");
?>

<div class="container">
	<h1>Book Manager</h1>

	<hr>

	<?php if (isset($_SESSION["logged_in"])) { ?>
	<p>To get started, go to your <a href="library.php">library</a>.</p>
	<?php } else { ?>
	<p>To get started, <a href="login.php">log in</a> or <a href="register.php">register</a>.</p>
	<?php } ?>
</div>
<?php
require_once("footer.php");
?>