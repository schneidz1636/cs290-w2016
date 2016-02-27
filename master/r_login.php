<?php include("_header.php");?>

<h1>Log in</h1>

<?php
//function to test input for non-normal input
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$sendBackTo = isset($_REQUEST["sendBackTo"]) ? $_REQUEST["sendBackTo"] : "index.php";

if (isset($_POST["r_username"]) && isset($_POST["r_password"])) {
	// user is trying to log in; if valid login, then redirect to where the user is trying to get back to
	$username = test_input($_POST["r_username"]);
	$password = test_input($_POST["r_password"]);
	$hashedPassword = base64_encode(hash('sha256',$password . $username));
	$query = $mysqli->prepare("select uid from users where username = ? and password = ?");
	$query->bind_param("ss",$username, $hashedPassword);
	if ($query->execute()) {
		$query->bind_result($uid);
		while($query->fetch()){ 
			// if any rows come back, then the login is valid
			$_SESSION["uid"] = $uid;
			echo "<script>location.replace(".json_encode($sendBackTo).");</script>";
			exit();
		} 
		$query->close();
	}
	echo "Please enter a valid username and password.";
}
?>


<?php include("_footer.php");?>
