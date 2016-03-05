<?php include("_header.php");

function book_image_url($isbn_temp) {
	$tempURL = 'https://www.googleapis.com/books/v1/volumes?q=isbn:' . htmlspecialchars($isbn_temp);
	$json = file_get_contents($tempURL);
	$bookstring = json_decode($json);
	
	if(isset($bookstring->items[0]->volumeInfo->imageLinks->thumbnail)){
		$bookThumbnail = $bookstring->items[0]->volumeInfo->imageLinks->thumbnail;
	}else{
		$bookThumbnail = "images/unavailable.jpg";
	}
	
	return $bookThumbnail;
}
?>
	
<div class="page">	
		
	<div class="container-fluid">
		<div class="jumbotron top-body">
			<center><h1>OSU Book Tracker</h1></center>
			<p>Welcome to the OSU book tracker. This site is intended to help you keep track of your book collection.
			   If you have an account, log in and look at your books, and other user's books! If you are not a member,
			   please use the sign up button in order to create an account. </p>
			

		</div>
	</div>
	

	<center>	
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
	
			<ol class="carousel-indicators">
			
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
		
			</ol>
			
			<!-- Wrapper for slides-->
			<!--<div class="row">-->
			<h3 class="carousel-header">Random covers from our collection</h3>
				<div class="col-lg-12">
					<div class="carousel-inner" role="listbox">
						<?php
							$result = $mysqli->query("SELECT COUNT(*) FROM books");
							$row = $result->fetch_row();
							$count = $row[0] - 1;
							
							if (!$result) {
								echo "<p style='color: #ff0000;'>". $mysqli->error . "</p>";
							}
							
							for ($i = 0; $i < 4; $i++) {
								$offset = rand(0,$count);
								$result = $mysqli->query("SELECT * FROM books LIMIT 1 OFFSET $offset");
								if ($row = $result->fetch_assoc()) {
									$book_url = book_image_url($row['isbn']);
									
								} else {
									$book_url = "images/unavailable.jpg";
								}
							?>
							
								<div class="item <?php if ($i == 0) { echo 'active'; } ?>">
									<img src="<?php echo $book_url; ?>" alt="<?php echo $row['isbn']; ?>" class="carousel-image">
								</div>
							
							<?php
								
							} // End of for 
							?>
					</div>
					<!-- Left and right controls -->
					
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
			
				</div>		
			<!--</div>-->
		</div>	
	</center>		

	<p class="hideit">.</p>
	</div>

	
	
<?php include("_footer.php");?>