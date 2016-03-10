<?php
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","grantch-db","rVrkAizgwSrdVJlU","grantch-db");
if(mysqli_connect_errno()){
	printf("Connection failed: %s\n", mysqli_connect_error());
	exit;
}

$errors = array(); //hold validation errors
$data = array(); //passback array because ajax likes that

$isbn = $mysqli->real_escape_string($_REQUEST['isbn']);

if (empty($isbn))
	$errors['isbn'] = 'ISBN is empty';

if(empty($errors)) {
	if ($result = $mysqli->query("SELECT `username`, `comment`, `time`, `book_ISBN13` FROM `comment` JOIN `users` on comment.user_iduser = users.uid WHERE comment.book_ISBN13=".$isbn)){
		while($obj = $result->fetch_assoc()){
			$data[] = $obj;
		}
	}else{
		$data['success'] = false;
		$data['errors'] = $errors;
	}
}
echo json_encode($data);
$mysqli->close();
?>