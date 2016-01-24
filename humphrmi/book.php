<?php
require_once("header.php");
?>

<style>
	.standout {
		font-weight: bold;
	}
</style>

<div class="container">
	<h1>
	<?php
	$book = null;
	
	if ($_GET['id'] == 1) {
		echo "Harry Potter";
		$book = json_decode(file_get_contents("http://isbndb.com/api/v2/json/YYH6FGB2/book/0747551006"));
	} else if ($_GET['id'] == 2) {
		echo "Lord of the Rings";
		$book = json_decode(file_get_contents("http://isbndb.com/api/v2/json/YYH6FGB2/book/0395082544"));
	} else if ($_GET['id'] == 3) {
		echo "Punk Rock for Dummies";
		$book = json_decode(file_get_contents("http://isbndb.com/api/v2/json/YYH6FGB2/book/1423426223"));
	} else {
		echo "Unknown";
		$book = null;
	} ?>
	</h1>
	<hr>
	<img src="http://covers.openlibrary.org/b/isbn/<?php echo $book->data[0]->isbn13; ?>-M.jpg" />
	<div>
		<span class="standout">Title: </span><?php echo $book->data[0]->title; ?>
	</div>
	<div>
		<span class="standout">Author: </span><?php echo $book->data[0]->author_data[0]->name; ?>
	</div>
	<div>
		<span class="standout">Publisher: </span><?php echo $book->data[0]->publisher_name; ?>
	</div>
	<div>
		<span class="standout">Summary: </span><?php echo $book->data[0]->summary; ?>
	</div>
	<div>
		<span class="standout">Notes: </span><?php echo $book->data[0]->notes; ?>
	</div>
</div>

<?php
require_once("footer.php");
?>