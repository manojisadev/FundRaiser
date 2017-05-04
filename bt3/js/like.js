$("button#liked-bt").on('click', function() {
	var username = $('button#comment').val();
	var like_value = $('button#liked-bt').val();
	//var pid = $('#pid').text();
	var label = $('#pid');
	var pid = label.attr('value');
	$.ajax({
		url: 'ajax/liked.php',
		type: 'POST',
		data: {username: username,like_value: like_value,pid: pid},
		success: function(data){
			if(data.trim() == 'Database query failed.'){
				alert('You need to be logged in???/');
			} else {
			
				 $("button#liked-bt").val(data);
				 $("#liked-bt span").text(data);
				 location.reload();
				//alert(data);
			}
		}
	});

});