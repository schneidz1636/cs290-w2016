<!DOCTYPE html>
<html lang='en'>

	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<!--THis is to connect to local custom style sheet. -->
		<link rel="stylesheet" type="text/css" href="style.css">
				
	</head>
	
	
<body>
		
	<!--This is the beginning of the navbar code-->
	
 		<nav class="navbar navbar-inverse navbar-fixed">
 			 <div class="container-fluid">
    				<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						
						</button>
					
     				<a class="navbar-brand" href="index.php">OSU Book Tracker!</a>
  			  </div>
    	<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="#">Books Available</a></li>
				<li><a href="addBook.php">Add Book</a></li>
      			<li><a href="formAdd.php">Add Location</a></li>
				<li><a href="#">My Inventory</a></li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
      			<li><a href="addUser.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      			<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>

		</div>
		
		</nav>
	<main>
	
	<?php $mysqli = new mysqli("oniddb.cws.oregonstate.edu", "woodal-db", "z2uX511usXYDJ4Y0", "woodal-db");?>