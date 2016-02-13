<?php 
session_start();

require("flashMessages.php");

function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}

function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}

function checkAuth($doRedirect) {
	if (isset($_SESSION["onidid"]) && $_SESSION["onidid"] != "") return $_SESSION["onidid"];

	 $pageURL = 'http';
	 if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["SCRIPT_NAME"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"];
	 }

	$ticket = isset($_REQUEST["ticket"]) ? $_REQUEST["ticket"] : "";

	if ($ticket != "") {
		$url = "https://login.oregonstate.edu/cas/serviceValidate?ticket=".$ticket."&service=".$pageURL;
		$html = file_get_contents($url);
		$pattern = '/\\<cas\\:user\\>([a-zA-Z0-9]+)\\<\\/cas\\:user\\>/';
		preg_match($pattern, $html, $matches);
		if ($matches && count($matches) > 1) {
			$onidid = $matches[1];
			$_SESSION["onidid"] = $onidid;
			return $onidid;
		} 
	} else if ($doRedirect) {
		$url = "https://login.oregonstate.edu/cas/login?service=".$pageURL;
		echo "<script>location.replace('" . $url . "');</script>";
	} 
	return "";
}

$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "woodal-db", "z2uX511usXYDJ4Y0", "woodal-db");

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
		<!--link rel="stylesheet" type="text/css" href="style.css"-->
				
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
				<script>//alert("$_SERVER[SCRIPT_NAME'] = <?php echo $_SERVER['SCRIPT_NAME']; ?>");</script>
				<li <?php if (endsWith($_SERVER['SCRIPT_FILENAME'], "index.php")) { echo "class='active'"; } ?>"><a href="index.php">Home</a></li>
				<li><a href="#">Books Available</a></li>
				<li <?php if (endsWith($_SERVER['SCRIPT_FILENAME'], "addBook.php")) { echo "class='active'"; } ?>><a href="addBook.php">Add Book</a></li>
      			<li <?php if (endsWith($_SERVER['SCRIPT_FILENAME'], "formAdd.php")) { echo "class='active'"; } ?>><a href="formAdd.php">Add Location</a></li>
				<li><a href="#">My Inventory</a></li>
			</ul>
			
			<?php if (isset($_SESSION["onidid"])){?>
				<ul class="nav navbar-nav navbar-right">
				 
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			<?php } else if (false) { ?>
				<ul class="nav navbar-nav navbar-right">
				
					<li><a href="https://secure.onid.oregonstate.edu/cgi-bin/newacct?type=want_auth"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="https://login.oregonstate.edu/cas/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			<?php } ?>	
			</ul>

		</div>
		
		</nav>
	<main>
		<div class="container">
			<?php
				$msg = new FlashMessages();
				$msg->display();
			?>
		</div>