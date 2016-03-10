$(document).ready(function(){
	var form = $('#form_submit');
	var submit = $('#submit_comment');
	getComments();

	form.on('submit', function(e){
		e.preventDefault();
		$.ajax({
			url:'add_comment.php',
			type:'POST',
			cache: false,
			data: form.serialize(),
			datatype: 'json',
			beforeSend: function(){
				submit.prop('disabled', true);
				$('#comment').prop('disabled', true);
			},
			success: function(data){
				submit.prop('disabled', false);
				$('#comment').prop('disabled', false);
				$('#comment_section').empty();
				getComments();
			},
			error:function(e){
				alert(e);
			}
		});
	});
	function getComments(){
		$.ajax({
			method:"GET",
			url:"view_comment.php?isbn=9780393082104", //"view_comment.php?isbn="+('#isbn').val()
			dataType:"json",
			success:function(data){
				console.log(data);
				for(var i = 0; i < data.length; i++){
					console.log(data[i].username);
					var html = `
					<div class ="post-heading">
					<div class ="pull-left image">
					<img src="http://i.imgur.com/tdlPf1F.png" class="img-circle avatar" alt="user profile image">
					</div>
					<div class="pull-left meta">
					</div>
					<div class="title h5">
					<b>`+data[i].username+`</b> posted a comment
					<h6 class="text-muted time">`+data[i].time+`</h6>
					</div>
					</div>
					<div class="post-description">
					<p>`+data[i].comment+`</p>
					</div>`
					$(html).appendTo('#comment_section');

				}
			},
			error:function() { 
				alert('error!');
			}
		});
	}
});