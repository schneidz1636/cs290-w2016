<?php
require_once("header.php");
?>

<div class="container">
	<h1>Library</h1>
	<hr>
	<a class="btn btn-default" href="addbook.php">Add Book</a>
	<hr>
	
	<div class="list-group">
		<a href="book.php?id=1" class="list-group-item">
			<h4 class="list-group-item-heading">Harry Potter</h4>
			<p class="list-group-item-text">A wildly popular series.</p>
		</a>
		<a href="book.php?id=2" class="list-group-item">
			<h4>Lord of the Rings</h4>
			<p class="list-group-item-text">A fantasy novel.</p>
		</a>
		<a href="book.php?id=3" class="list-group-item">
			<h4>Punk Rock for Dummies</h4>
			<p class="list-group-item-text">Learn about Punk Rock. If you're a dummy.</p>
		</a>
	</div>
</div>

<?php
require_once("footer.php");
?>