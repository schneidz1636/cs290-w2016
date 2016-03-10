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
	

//gets the json from googleapi and puts it into bookstring object.

$tempURL = 'https://www.googleapis.com/books/v1/volumes?q=isbn:'.htmlspecialchars($isbn).'&key=AIzaSyCl9zbmJi8v7l1tP5ky1Z89nOaOpW4YCYo';
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
			<div>
				<img src= "<?php echo $bookThumbnail;?>" class="img-responsive center-block"/>
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
				</table>
			
			</div>
		</div>

	</div>
</div>

</div>
<link rel="stylesheet" type="text/css" href="http://recarbonated.me/images/pretty.css"></link>
<script src="add_comment.js"></script>
<div class="container-fluid">
	<div class="col-sm-8">
		<div class="form-group">
			<form id="form_submit" method="POST" action="add_comment.php">
			<!-- need to supply post id with hidden fild -->
				<div class="input-group">
					<input class="form-control" name="comment" id="comment" rows="3" placeholder="Type your comment here." required>
					<span class="input-group-addon">
						<button type="submit" id="submit_comment">Submit</button>
					</span>
				</div>
				<input type = "hidden" name="uid" value="<?php echo $_SESSION['uid'] ?>">
				<input type = "hidden" name="isbn" id = "comment_isbn" value="<?php echo $isbn ?>">
				<!--<button type = "submit" id="submit_comment">You too</button>-->
			</form>
		</div>
		<div id ="comment_section" class ="panel panel-white post"> <!--Comment Section-->
		</div>
	</div>
</div>
	
<?php } ?>
<?php include("_footer.php");?>