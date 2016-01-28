<?php include("_header.php");?>
			
	<h1>Results</h1>
		
	<li><label>ISBN Number:</label><?php print(htmlspecialchars($_REQUEST["isbntmp"]))?>	
	
	<?php
	$isbntmp=$_REQUEST["isbntmp"];

	$tempURL="https://www.googleapis.com/books/v1/volumes?q=isbn:" .$isbntmp;
		
	$json=file_get_contents($tempURL);
	
	$array=json_decode($json);

	echo "<p><h1>Title: " .$array->items[0]->volumeInfo->title ."</h1></p>";
	?>
			
<?php include("_footer.php");?>