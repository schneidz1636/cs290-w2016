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
//getting location from the DB

$uid = test_input($_SESSION['uid']);
$isbn = test_input($_REQUEST["q"]);
$query = $mysqli->prepare("select title,authors,publisher,pagecount from books where isbn = ?");
$query->bind_param("i",$isbn);
	if ($query->execute()) {
		$query->bind_result($title, $authors, $publisher, $pagecount);
		while($query->fetch()){ 
		} 
		$query->close();
	}	
	
$query = $mysqli->prepare("select location from user_has_book where user_iduser = ? and book_isbn13 = ?");
$query->bind_param("ii",$uid, $isbn);
	if ($query->execute()) {
		$query->bind_result($location);
		while($query->fetch()){ 
		} 
		$query->close();
	}	
	

//gets the json from googleapi and puts it into bookstring object.

$tempURL = 'https://www.googleapis.com/books/v1/volumes?q=isbn:'.$isbn;
$json = file_get_contents($tempURL);
$bookstring = json_decode($json);


if(isset($bookstring->items[0]->volumeInfo->description)){
	$description = $bookstring->items[0]->volumeInfo->description;
}else{
	$description = "Description unavailable";
}


if(isset($bookstring->items[0]->volumeInfo->publishedDate)){
	$publishedDate = $bookstring->items[0]->volumeInfo->publishedDate;
}else{
	$publishedDate = "Date published unavailable";
}


if(isset($bookstring->items[0]->volumeInfo->imageLinks->thumbnail)){
	$bookThumbnail = $bookstring->items[0]->volumeInfo->imageLinks->thumbnail;
}else{
	$bookThumbnail = "images/unavailable.jpg";
}



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
			<h2> <?php echo test_input($title);?> </h2>
			<h3>by: <?php echo test_input($authors);?> </h3>
			<p> <?php echo $description; ?></p>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<table class="table" style="padding-top:20px;">
			<tr>
				<td>ISBN13:</td>
				<td><?php echo test_input($isbn); ?></td>
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
				<td>Pages:</td>
				<td><?php echo test_input($pagecount); ?></td>
			</tr>
			<tr>
				<td>Location:</td>
				<td><?php echo test_input($location); ?></td>
			</tr>
			</table>
			<div class="col-sm-4 col-md-4 col-xs-4">
			<form method="post" action='update_location.php' class="inform">
						<div class="form-group">
					
							<label>Change Location:</label>
							<input type="text" name ="location" class="form-control" value="<?php echo test_input($location); ?>">
							<input type="hidden" name="isbn" value="<?php echo test_input($isbn); ?>">
						</div>
						<div class="form-group">
						
							<button type="submit" class="btn btn-default" name="submit">Change Location</button>
						
						</div>		
			
		</div>
			
		</div>

	</div>

</div>
	
	
	
<?php } ?>
<?php include("_footer.php");?>