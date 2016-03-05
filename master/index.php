<?php include '_header.php' ?>


		<div class="container-fluid">
		<div class="jumbotron">
			<h1>OSU Book Tracker</h1>
			<p>Welcome to the OSU book tracker. This site is intended to help you keep track of your book collection.
			   If you have an account, log in and look at your books, and other users books! If you are not a member,
			   please use the sign up button in order to create an account. </p>
			

		</div>
		</div>

	<div class="container-fluid">
	
				<div class="row">
				<div class="col-sm-4">Place holder a, b, and c!</div>
				<div class="col-sm-8">Place holder d, e, and f!</div>
				
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
		<div class="row">
			<div class="col-lg-12">
				<div class="carousel-inner" role="listbox">
					<h3>Random covers from our collection</h3>
						<div class="item active">
						<!--I found an api to use to pull in thumbnails of the book cover art from google api's-->	
						<!--We could use php to parse the Json, and grab the thumbnail links-->
						<img src="http://books.google.com/books/content?id=Hp2nnBrUh5cC&printsec=frontcover&img=1&zoom=1&source=gbs_api" alt="HTML CSS COVER" width="200" height="200">
						</div>
			
						<div class="item">			
						<!--I found an api to use to pull in thumbnails of the book cover art from google api's-->			
						<img src="http://books.google.com/books/content?id=-DG18Nf7jLcC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api" alt="Digital Logic Design cover" width="200" height="200">			
						</div>
			
						<div class="item">			
						<!--I found an api to use to pull in thumbnails of the book cover art from google api's-->			
						<img src="http://books.google.com/books/content?id=i1nhPIbQylcC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api" alt="Space Chronicle cover" width="200" height="200">			
						</div>
			
						<div class="item">			
						<!--I found an api to use to pull in thumbnails of the book cover art from google api's-->			
						<img src="http://books.google.com/books/content?id=JT2oufFK4tkC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api" alt="Linux Bible cover" width="200" height="200">			
						</div>
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
		</div>
		</div>	
	</center>		

<?php include '_footer.php' ?>