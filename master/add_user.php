<?php include("_header.php");?>

<?php
// define variables and set to empty values
$userNameErr = $nameErr = $password1Err = $password2Err = $emailErr = "";
$userName = $name = $password1 = $password2 = $email = "";
$userNameGood = $nameGood = $password1Good = $password2Good = $emailGood = false;
$errorMsg = "";
//checks to make sure each data block is filled and sans data input for non-normal input
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(empty($_POST["userName"])){
		$userNameErr = "User name is required";
		$userNameGood = false;
	}else{
		$userName = test_input($_POST["userName"]);
		$userNameGood = true;
	}
  
	if(empty($_POST["name"])){
		$nameErr = "Name is required";
		$nameGood = false;
	}else{
		$name = test_input($_POST["name"]);
		$nameGood = true;
	}
  
	if(empty($_POST["password1"])){
		$password1Err = "Password is required";
		$password1Good = false;
	} else {
		$password1 = test_input($_POST["password1"]);
		$password1Good = true;
	}
  
	if (empty($_POST["password2"])){
		$password2Err = "Password is required";
		$password2Good = false;
	}else{
		$password2 = test_input($_POST["password2"]);
		$password2Good = true;
	}

	if(empty($_POST["email"])){
		$emailErr = "Email is required";
		$emailGood = false;
	}else{
		$email = test_input($_POST["email"]);
		$emailGood = true;
	}
	
	if($password1 !== $password2){
		$password1Good = false;
		$password2Good = false;
		echo "<h4 class='error'>Passwords do not match!</h4>";
	}
	
	if(($userNameGood && $nameGood && $password1Good && $password2Good && $emailGood) === true){
		// check if username is taken
		$query = $mysqli->prepare("select uid from users where username = ?");
		$query->bind_param("s",$userName);
		if ($query->execute()){
			$query->bind_result($uid);
			if($query->fetch()){ 
				// if any rows come back, then this user exists already
				$errorMsg = "That username is taken.";
				$password1Good = false;
				$password2Good = false;
				$userNameGood = false;
				$nameGood = false;
				$emailGood = false;
    		} 
			$query->close();	
		}

		if($errorMsg == ""){
			// ok, we can just insert the record
			$hashedPassword = base64_encode(hash('sha256',$password1 . $userName));
			if($stmt = $mysqli->prepare("insert into users(username,name,password,email) values(?,?,?,?)")){
				$stmt->bind_param("ssss", $userName, $name, $hashedPassword, $email);
					$stmt->execute();
				$stmt->close();
				echo "<script>location.replace(\"http://web.engr.oregonstate.edu/~grantch/test/user_added.php\");</script>";
			}else{
				printf("Error: %s\n", $mysqli->error);
			}
		}else{
			echo "<h4 class='error'>".htmlspecialchars($errorMsg)."</h4>";
		}
	}	
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>

<!-- login form -->
<div class="container" >
<h1>Welcome New User!</h1>
<div class="conatainer">
	<div class="row">	
		<div class="col-lg-6">		
			<div class="well" background color="#f8f8f8">				
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">			
					<div class="form-group">						
						<label for="userName">User Name: <span class="error">* <?php echo $userNameErr;?></span>
						<input type="text" class="form-control" name="userName" id="userName" size="35" value="<?php echo $userName;?>">						
						</label>
					</div>					
					<div class="form-group">					
						<label for="name">Name: <span class="error">* <?php echo $nameErr;?></span>
						<input type="text" class="form-control" name="name" id="name" size="35" value="<?php echo $name;?>">						
						</label>		
					</div>					
					<div class="form-group">						
						<label for="password1">Password: <span class="error">* <?php echo $password1Err;?></span>
						<input type="password" class="form-control" name="password1" id="passwordInput1" size="35">						
						</label>						 
					</div>					
					<div class="form-group">				
						<label for="password">Confirm Password: <span class="error">* <?php echo $password2Err;?></span>
						<input type="password" class="form-control" name="password2" id="passwordInput2" size="35">
						<p class="registrationFormAlert" id="PasswordMatch"></p>
						</label>						
					</div>										
					<div class="form-group">				
						<label for="email">Email Address: <span class="error">* <?php echo $emailErr;?></span>
						<input type="email" class="form-control" name="email" id="email" size="35" value="<?php echo $email;?>">						
						</label>												
					</div>
					<button type="submit" class="btn btn-default" name="submit">Create User</button>									
				</form>				
			</div>		
		</div>		
	</div>
</div>
</div>


<!-- this checks to make sure that passwords match while user enters them-->
<script>
$(function checkPass() {
    $("#passwordInput2").keyup(function checkPass() {
        var password = $("#passwordInput1").val();
		if(password !== ""){
			$("#PasswordMatch").html(password == $(this).val() ? "Passwords match." : "Passwords do not match!");
		}else{
			
		}
       
    });
	$("#passwordInput1").keyup(function checkPass() {
        var password = $("#passwordInput2").val();
		if(password !== ""){
			$("#PasswordMatch").html(password == $(this).val() ? "Passwords match." : "Passwords do not match!");
		}else{
			
		}

    });
});
</script>


<?php include("_footer.php");?>