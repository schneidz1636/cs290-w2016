<?php include("_header.php");?>

<div class="page">
<div class="well" style="margin-bottom: 0;">
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

if (isset($_POST["username"]) && isset($_POST["password"])) {
	// user is trying to log in; if valid login, then redirect to where the user is trying to get back to
	$username = test_input($_POST["username"]);
	$password = test_input($_POST["password"]);
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

<div class="container">
	<h1>Please Login</h1>
		<div class="col-lg-6">
			<div class="well" background color="#f8f8f8">
				<form method="post" action='login.php' class="inform">
					<div class="form-group">
						<label for="username">Username: 
						<input type="text" class="form-control" name="username">
						<label for="password">Password:</label>
						<input type="password" class="form-control" name="password">
						<button type="submit" class="btn btn-default" name="submit">Log On</button>
					</div>
					<div class="form=group">
					<input type="hidden" name="sendBackTo" value="<?= htmlspecialchars($sendBackTo) ?>">
					</div>
				</form>
			</div>
		</div>
</div>
</div>
</div>

<?php include("_footer.php");?>
