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
						user_id : document.getElementById('jsid').value,
						fetch : 1,
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
					var user_vote = $(widget).data('fsr')[document.getElementById('jsid').value];
					 
					$(widget).find('.star_' + avg).prevAll().andSelf().addClass('ratings_vote');
					$(widget).find('.star_' + avg).nextAll().removeClass('ratings_vote'); 
					$(widget).find('.total_votes').text( votes + ' votes (' + exact + ' stars)' );
					
					if (typeof user_vote === 'undefined') {
						$(widget).find('.vote_value').text('Click a star to rate!');
					}
					else {
						$(widget).find('.vote_value').text('Your rating: ' + user_vote );
					}
				}
				
				// Allows voting to work only when logged in
				<?php if (isset($_SESSION["uid"])){?>
				$('.ratings_stars').bind('click', function() {
					var star = this;
					var widget = $(this).parent();
					 
					var clicked_data = {
						clicked_on : $(star).attr('class'),
						widget_id : $(star).parent().attr('id'),
						user_id : document.getElementById('jsid').value
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
	<input type="hidden" name="jsid" id="jsid" value="<?php echo $_SESSION["uid"]?>"></input>
			
		
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
						echo 	'<li id="navbar-home"><a href="index.php">Home</a></li>';
						echo	'<li id="navbar-site-book"><a href="view_all_books.php">Site Inventory</a></li>';
						echo	'<li id="navbar-books"><a href="view_books.php">My Books</a></li>';
						echo	'<li id="navbar-search"><a href="isbn_search_input.php">Add Book</a></li>';
						echo '</ul>';
						echo '<ul class="nav navbar-nav navbar-right">';
						echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
					}else{
						echo '<ul class="nav navbar-nav">';
						echo 	'<li id="navbar-home"><a href="index.php">Home</a></li>';
						echo '</ul>';
						echo '<ul class="nav navbar-nav navbar-right">';
						echo '<li><a href="add_user.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
						echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
					}
				?>		
			</ul>
		</div>

		<!-- Highlight the current page in navbar -->
		<script>
		pathname = window.location.pathname;
		scriptname = pathname.substring(pathname.lastIndexOf('/') + 1);

		if (scriptname === "index.php") {
			$("#navbar-home").addClass("active");
		} else if (scriptname === "view_all_books.php") {
			$("#navbar-site-book").addClass("active");
		} else if (scriptname === "view_books.php") {
			$("#navbar-books").addClass("active");
		} else if (scriptname === "isbn_search_input.php") {
			$("#navbar-search").addClass("active");
		}
		</script>		
		</nav>
	<main>
<?php
ini_set('display_errors', 'On');

$mysqli = new mysqli("oniddb.cws.oregonstate.edu","grantch-db","rVrkAizgwSrdVJlU","grantch-db");

?>
