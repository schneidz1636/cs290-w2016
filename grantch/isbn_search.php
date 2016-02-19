<?php include("_header.php");?>
<?php 
	if (checkAuth(true) != "") {
?>	
	
<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$isbn_temp = test_input($_REQUEST["isbn_temp"]);
$tempURL = 'https://www.googleapis.com/books/v1/volumes?q=isbn:'.$isbn_temp;
$json = file_get_contents($tempURL);
$bookstring = json_decode($json);

if($bookstring->totalItems == "0"){
	echo "<script>location.replace(\"http://web.engr.oregonstate.edu/~grantch/test/bad_isbn.php\");</script>";
}

?>
		
	<div class="container-fluid">
		<div class="col-sm-4 col-md-4 col-xs-4 ">
			<img src= "<?php echo $bookstring->items[0]->volumeInfo->imageLinks->thumbnail;?>" class="img-responsive center-block"/>
		</div>
		<div class="col-sm-6 col-md-8 col-xs-12">  
			<h2> <?php echo $bookstring->items[0]->volumeInfo->title;?> by:
			<?php echo $bookstring->items[0]->volumeInfo->authors[0];
			//echo ' & ';
			//echo $bookstring->items[0]->volumeInfo->authors[1]; ?> </h2>
			<p> <?php echo $bookstring->items[0]->volumeInfo->description; ?></p>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<table class="table" style="padding-top:20px;">
			<tr>
				<td>ISBN13:</td>
				<td><?php echo $bookstring->items[0]->volumeInfo->industryIdentifiers[0]->identifier; ?></td>
			</tr>
			<tr>
				<td>Publisher:</td>
				<td><?php echo $bookstring->items[0]->volumeInfo->publisher; ?></td>
			</tr>
			<tr>
				<td>Publish Date:</td>
				<td><?php echo $bookstring->items[0]->volumeInfo->publishedDate; ?></td>
			</tr>
			<tr>
				<td>Pages</td>
				<td><?php echo $bookstring->items[0]->volumeInfo->pageCount; ?></td>
			</tr>
			</table>
		</div>

	</div>
	
	
<?php } ?>
<?php include("_footer.php");?>