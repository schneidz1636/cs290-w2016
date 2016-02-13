<?php
session_start();

require("flashMessages.php");

unset($_SESSION["onidid"]);
unset($_SESSION["ticket"]);

$msg = new FlashMessages();
//$msg->success("Successfully logged out!", "index.php");
$msg->success("Successfully logged out!", "https://login.oregonstate.edu/cas/logout");

//header('Location: https://login.oregonstate.edu/cas/logout');

?>
