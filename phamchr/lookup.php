
<!DOCTYPE html>
<html lang='en'>

<!--Setting up queries for the database -->
<!--?php
	//open connection to mysql db
	$connection = mysqli_connect("hostname","username","password","db_employee") or die("Error " . mysqli_error($connection));

	//fetch table rows from mysql db
	$sql = "select * from renting AND user AND books WHERE userID = *Whatever cookie/userID is set*;
	$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

	//create an array
	$emparray = array();
	while($row =mysqli_fetch_assoc($result))
	{
		$emparray[] = $row;
	}
	echo json_encode($emparray);

	//close the db connection
	mysqli_close($connection);
?-->
	<?php 
	if (isset($_GET['id'])){
		$i13 = $_GET['id'];
	}else{
		$i13 = "9780393082104";
	}
	$bookstring;
	$url = "https://www.googleapis.com/books/v1/volumes?q=isbn:". $i13;
	$json = file_get_contents($url);
	$bookstring = json_decode($json); 
	?>
	<!--This is the starter code for bootstrap-->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://recarbonated.me/images/bootstrap-table.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="http://recarbonated.me/images/bootstrap-table.min.js"></script>
		<title><?php echo $bookstring->items[0]->volumeInfo->title;?></title>
	</head>
	<!--This is the header/navbar that is present-->
	<body>
		<nav class="navbar navbar-inverse navbar-fixed">
			 <div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavBar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
					<a class="navbar-brand" href="#">OSU Book Tracker!</a>
			  </div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Books Available</a></li>
				<li><a href="#">Add Book</a></li>
				<li><a href="#">Add Location</a></li>
			<li><a href="#">My Inventory</a></li>
			</ul>
		<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</nav>
		</div>
		<!--This is the main body-->
	<div class="container-fluid">
		<div class="col-sm-4 col-md-4 col-xs-4 ">
			<img src= "<?php echo $bookstring->items[0]->volumeInfo->imageLinks->thumbnail;?>" class="img-responsive center-block"/>
		</div>
		<div class="col-sm-6 col-md-8 col-xs-12">  
			<h2> <?php echo $bookstring->items[0]->volumeInfo->title;?> by:
			<?php echo $bookstring->items[0]->volumeInfo->authors[0];
			echo ' & ';
			echo $bookstring->items[0]->volumeInfo->authors[1]; ?> </h2>
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
			<tr>
				<td>Edition:</td>
				<td><?php echo $bookstring->data[0]->edition_info; ?></td>
			</tr>
			</table>
		</div>

	</div>
	</body>
</html>