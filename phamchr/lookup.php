
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
	$bookstring;
	$url = "http://isbndb.com/api/v2/json/YYH6FGB2/book/9780393082104";
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
		<title><?php echo $bookstring->data[0]->title;?></title>
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
		<div class="col-sm-4 col-md-4 col-xs-4 image-container">
			<div class="thumbnail" style="border:none; background:white;">
				<img src="http://recarbonated.me/images/2015-11-05_12-27-50.png" style="width:fill; center" />
			</div>
		</div>
		<div class="col-sm-6 col-md-8 col-xs-12">  
			<h2> <?php echo $bookstring->data[0]->title;?> by:
			<?php echo $bookstring->data[0]->author_data[0]->name;
			echo ' & ';
			echo $bookstring->data[0]->author_data[1]->name; ?> </h2>
			<p> <?php echo $bookstring->data[0]->summary;?></p>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<table class="table" style="padding-top:20px;">
			<tr>
				<td>ISBN10:</td>
				<td><?php echo $bookstring->data[0]->isbn10; ?></td>
			</tr>
			<tr>
				<td>ISBN13:</td>
				<td><?php echo $bookstring->data[0]->isbn13; ?></td>
			</tr>
			<tr>
				<td>Publisher:</td>
				<td><?php echo $bookstring->data[0]->publisher_name; ?></td>
			</tr>
			<tr>
				<td>Physical Characteristics:</td>
				<td><?php echo $bookstring->data[0]->physical_description_text; ?></td>
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