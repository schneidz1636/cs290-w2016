<?php 
session_start(); 

function currentUrl() {
	$pageURL = 'http';
	if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["SCRIPT_NAME"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"];
	}
	return $pageURL;
}

// returns the user's uid if logged in
// or returns "" <-- in this case, pass $redirectIfNeeded = true to force login
function checkAuth($redirectIfNeeded) {
	if (isset($_SESSION["uid"]) && $_SESSION["uid"] != "") {
		return $_SESSION["uid"];
	} else if ($redirectIfNeeded) {
		$currentUrl = currentUrl();
		$urlOfLogin = "login.php?sendBackTo=".rawurlencode($currentUrl)."&cb=".microtime(true);
		echo "<script>location.replace('$urlOfLogin');</script>";
		return "";
	} else {
		return "";
	}
}
?>

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
				
				
		<!-- 5-Star Rating System -->		
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script>
		
			$(document).ready(function() {
			
				$('.ratings_stars').hover(
					// Handles the mouseover
					function() {
						$(this).prevAll().andSelf().addClass('ratings_over');
						$(this).nextAll().removeClass('ratings_vote'); 
					},
					// Handles the mouseout
					function() {
						$(this).prevAll().andSelf().removeClass('ratings_over');
						set_votes($(this).parent());
					}
				);
				
				
				$('.rate_widget').each(function(i) {
					var widget = this;
					var out_data = {
						widget_id : $(widget).attr('id'),
						fetch: 1
					};
					$.post(
						'ratings.php',
						out_data,
						function(INFO) {
							$(widget).data( 'fsr', INFO );
							set_votes(widget);
						},
						'json'
					);
				});
				
				function set_votes(widget) {
		 
					var avg = $(widget).data('fsr').whole_avg;
					var votes = $(widget).data('fsr').number_votes;
					var exact = $(widget).data('fsr').dec_avg;
					 
					$(widget).find('.star_' + avg).prevAll().andSelf().addClass('ratings_vote');
					$(widget).find('.star_' + avg).nextAll().removeClass('ratings_vote'); 
					$(widget).find('.total_votes').text( votes + ' votes recorded (' + exact + ' rating)' );
				}
				
				// Allows voting to work only when logged in
				<?php if (isset($_SESSION["onidid"])){?>
				$('.ratings_stars').bind('click', function() {
					var star = this;
					var widget = $(this).parent();
					 
					var clicked_data = {
						clicked_on : $(star).attr('class'),
						widget_id : $(star).parent().attr('id'),
						user_id : $("jsid").text()
					};
					$.post(
						'ratings.php',
						clicked_data,
						function(INFO) {
							widget.data( 'fsr', INFO );
							set_votes(widget);
						},
						'json'
					); 
				});
				<?php }?>
			});
			
		</script>

	</head>
	
	
<body>
		
	<!-- Code to help JS get onidid for 5-Star-->
	<input type="hidden" name="jsid" value="<?=$_SESSION['onidid'];?>"></input>
			
		
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
				<?php
					//this changes the log-in/log-out button based on if the user is logged in
					if(isset($_SESSION["uid"]) && $_SESSION["uid"] != ""){
						echo '<ul class="nav navbar-nav">';
						echo 	'<li class="active"><a href="index.php">Home</a></li>';
						echo	'<li><a href="#">Books Available</a></li>';
						echo	'<li><a href="add_book_input.php">Add Book</a></li>';
						echo	'<li><a href="#">Add Location</a></li>';
						echo	'<li><a href="view_books.php">View Books</a></li>';
						echo	'<li><a href="isbn_search_input.php">ISBN Search</a></li>';
						echo '</ul>';
						echo '<ul class="nav navbar-nav navbar-right">';
						echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
					}else{
						echo '<ul class="nav navbar-nav">';
						echo 	'<li class="active"><a href="index.php">Home</a></li>';
						echo '</ul>';
						echo '<ul class="nav navbar-nav navbar-right">';
						echo '<li><a href="add_user.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
						echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
					}
				?>		
			</ul>
		</div>	
		</nav>
	<main>
<?php
ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","grantch-db","ej8fAE53CuPl6Crn","grantch-db");
?>
