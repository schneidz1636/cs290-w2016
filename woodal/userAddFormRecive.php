<?php include("_header.php");?>

<h1>Saving your input...</h1>

<?php

	if($stmt = $mysqli->prepare("insert into users(uid,name,username,email,password) values(?,?,?,?,?)")){
	
		$uid = $_REQUEST["uid"];
		$name = $_REQUEST["name"];
		$username = $_REQUEST["username"];
		$email = $_REQUEST["email"];
		$password = $_REQUEST["password"];
		
		$stmt->bind_param("issss", $uid, $name, $username, $email, $password);
		$stmt->execute();
	
	}else{
	
		printf("Error: %s\n", $mysqli->error);
	
	}

?>

<?php include("_footer.php");?>