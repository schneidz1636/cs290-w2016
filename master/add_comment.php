<?php
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","grantch-db","rVrkAizgwSrdVJlU","grantch-db");
if(mysqli_connect_errno()){
	printf("Connection failed: %s\n", mysqli_connect_error());
	exit;
}

$errors = array(); //hold validation errors
$data = array(); //passback array because ajax likes that

$isbn = $mysqli->real_escape_string($_POST['isbn']);
$uid = $mysqli->real_escape_string($_POST['uid']);
$comment = $mysqli->real_escape_string($_POST['comment']);


if (empty($comment))
	$errors['comment'] = 'Comment is empty';

if (empty($uid))
	$errors['uid'] = 'User_ID is empty';

if (empty($isbn))
	$errors['isbn'] = 'ISBN is empty';

if (strlen($comment) > 240)
	$errors['comment'] = ' Comment is longer than 240 chars';

if(empty($errors)) {
	if ($mysqli->query("INSERT INTO comment(user_iduser, book_ISBN13, comment, time) values('$uid','$isbn','$comment',now())")){
		$data['success'] = true;
		$data['message'] = 'Success!';
	}else{
		$data['success'] = false;
		$data['errors'] = $errors;
	}
}
echo json_encode($data);
$mysqli->close();
?>