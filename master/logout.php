<?php include '_header.php' ?>

<h1>Logout</h1>

<?php

unset($_SESSION["uid"]);
echo "<script>location.replace('index.php');</script>";

?>




<?php include '_footer.php' ?>