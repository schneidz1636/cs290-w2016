<?php include '_header.php' ?>

<h1>Logout</h1>

<?php

$_SESSION["uid"] = "";
echo "<script>location.replace(\"http://web.engr.oregonstate.edu/~grantch/test/login.php\");</script>";

?>




<?php include '_footer.php' ?>