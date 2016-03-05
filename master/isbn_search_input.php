<?php include("_header.php");?>
<?php 
	if (checkAuth(true) != "") {
?>

<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<div class="well" background color="f8f8f8">
				<h1>Look up book</h1>
				<form method="post" action='isbn_search_test.php' class="inform" id="isbn_temp_form">
					<div class="form-group">
						<label for="isbn">ISBN:</label> 
						<input type="text" class="form-control" name="isbn_temp" size="35" id="isbn_temp">
					</div>
					<button type="submit" class="btn btn-default" name="submit">Search</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
function validate() {
	var isbn = $("#isbn_temp").val();
	isbn = isbn.replace(/[^0-9]/g, "");
	if (isbn.length != 10 && isbn.length != 13) {
		$("#incorrect_length_error").remove();
		$("div.form-group").append($("<p id='incorrect_length_error' style='color: #ff0000;'>This is not a valid ISBN number!</p>"));
		return false;
	} else {
		$("#incorrect_length_error").remove();
	}
	
	$("#isbn_temp").val(isbn);
	return true;
}

$("#isbn_temp").change(validate);
$("#isbn_temp_form").submit(function() {
	if (!validate()) {
		event.preventDefault();
	}
});
</script>

<?php } ?>
<?php include("_footer.php");?>