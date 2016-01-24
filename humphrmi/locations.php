<?php
require_once("header.php");
?>

<div class="container">
	<h1>Locations</h1>
	<hr>
	<a class="btn btn-default" href="addlocation.php">Add Location</a>
	<hr>
	
	<div class="list-group">
		<a href="location.php?id=1" class="list-group-item">
			<h4 class="list-group-item-heading">Mary</h4>
			<p class="list-group-item-text">2 books here</p>
		</a>
		<a href="location.php?id=2" class="list-group-item">
			<h4>Downstairs Bookshelf</h4>
			<p class="list-group-item-text">12 books here</p>
		</a>
		<a href="location.php?id=3" class="list-group-item">
			<h4>Beach house</h4>
			<p class="list-group-item-text">5 books here</p>
		</a>
		<a href="location.php?id=4" class="list-group-item">
			<h4>David's brother</h4>
			<p class="list-group-item-text">0 books here</p>
		</a>
	</div>
</div>

<?php
require_once("footer.php");
?>