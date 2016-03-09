<?php include("_header.php");?>
<?php 
	if (checkAuth(true) != "") {
?>	
	
<?php
//sans data of non-norm input
//using this a lot may want to move it so not so many dups
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
//gets the json from googleapi and puts it into bookstring object.
$isbn_temp = test_input($_REQUEST["q"]);
$tempURL = 'https://www.googleapis.com/books/v1/volumes?q=isbn:'.$isbn_temp;
$json = file_get_contents($tempURL);
$bookstring = json_decode($json);

if($bookstring->totalItems == "0"){
	echo "<script>location.replace(\"http://web.engr.oregonstate.edu/~grantch/test/bad_isbn.php\");</script>";
}
//This section checks if the parts of the object exist or not
//if exists puts data into variable, else, display DNE
if(isset($bookstring->items[0]->volumeInfo->title)){
	$title = $bookstring->items[0]->volumeInfo->title;
}else{
	$title = "Title unavailable";
}

if(isset($bookstring->items[0]->volumeInfo->authors[0])){
	$authors = $bookstring->items[0]->volumeInfo->authors[0];
}else{
	$authors = "Authors unavailable";
}

if(isset($bookstring->items[0]->volumeInfo->description)){
	$description = $bookstring->items[0]->volumeInfo->description;
}else{
	$description = "Description unavailable";
}

if(isset($bookstring->items[0]->volumeInfo->industryIdentifiers[0]->identifier)){
	if($bookstring->items[0]->volumeInfo->industryIdentifiers[0]->type == "ISBN_13"){
		$identifier = $bookstring->items[0]->volumeInfo->industryIdentifiers[0]->identifier;
	}elseif($bookstring->items[0]->volumeInfo->industryIdentifiers[1]->type == "ISBN_13"){
		$identifier = $bookstring->items[0]->volumeInfo->industryIdentifiers[1]->identifier;
	}else{
		$identifier = "ISBN unavailable";
	}
	
	
}else{
	$identifier = "ISBN unavailable";
}

if(isset($bookstring->items[0]->volumeInfo->publisher)){
	$publisher = $bookstring->items[0]->volumeInfo->publisher;
}else{
	$publisher = "Publisher unavailable";
}

if(isset($bookstring->items[0]->volumeInfo->publishedDate)){
	$publishedDate = $bookstring->items[0]->volumeInfo->publishedDate;
}else{
	$publishedDate = "Date published unavailable";
}

if(isset($bookstring->items[0]->volumeInfo->pageCount)){
	$pageCount = $bookstring->items[0]->volumeInfo->pageCount;
}else{
	$pageCount = "Page count unavailable";
}

if(isset($bookstring->items[0]->volumeInfo->imageLinks->thumbnail)){
	$bookThumbnail = $bookstring->items[0]->volumeInfo->imageLinks->thumbnail;
}else{
	$bookThumbnail = "images/unavailable.jpg";
}
//going to add function to add returned data into the book db if the user wants to.
$_SESSION['isbnTemp'] = htmlspecialchars($identifier);
$_SESSION['titleTemp'] = htmlspecialchars($title);
$_SESSION['authorsTemp'] = htmlspecialchars($authors);
//$_SESSION['descriptionTemp'] = test_input($description);
$_SESSION['publisherTemp'] = htmlspecialchars($publisher);
$_SESSION['pageCountTemp'] = htmlspecialchars($pageCount);


?>
	<div class="well">	
	<div class="container-fluid">
		<div class="col-sm-4 col-md-4 col-xs-4 add-marg">
			
			<img src= "<?php echo $bookThumbnail;?>" class="img-responsive center-block"/>
			
			
			<div class='book_rating'>
				<center>Rate this book!</center>
				<div id="<?php echo test_input($identifier); ?>" class="rate_widget">
					<div class="star_1 ratings_stars"></div>
					<div class="star_2 ratings_stars"></div>
					<div class="star_3 ratings_stars"></div>
					<div class="star_4 ratings_stars"></div>
					<div class="star_5 ratings_stars"></div>
					
					<div class="total_votes">0 votes</div>

					<?php if (isset($_SESSION["uid"])){  ?>
						<div class="vote_value">Click a star to vote!</div>
						
					<?php } else { ?>
						<div class="no_vote">Please log in to vote!</div>
					<?php } ?>
				</div>
			</div>
			
		</div>

		<div class="col-sm-6 col-md-8 col-xs-12">  
			<h2> <?php echo $title;?> by: <?php echo test_input($authors);?> </h2>
			<p> <?php echo $description; ?></p>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<table class="table" style="padding-top:20px;">
			<tr>
				<td>ISBN13:</td>
				<td><?php echo test_input($identifier); ?></td>
			</tr>
			<tr>
				<td>Publisher:</td>
				<td><?php echo test_input($publisher); ?></td>
			</tr>
			<tr>
				<td>Publish Date:</td>
				<td><?php echo test_input($publishedDate); ?></td>
			</tr>
			<tr>
				<td>Pages</td>
				<td><?php echo test_input($pageCount); ?></td>
			</tr>

			</table>

			

			<div class="col-sm-4 col-md-4 col-xs-4">
			<form method="post" action='data_isbn_into_db.php' class="inform">
				
					<!--<label>Add to books?</label>-->
					<button type="submit" class="btn btn-default" name="submit">Add Book</button>
					
			</form>
			
		</div>
			
		</div>

	</div>

</div>
	
	
	
<?php } ?>
<?php include("_footer.php");?>