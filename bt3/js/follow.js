$("button#follow-bt").on('click', function() {
	var follow_value = $('button#follow-bt').val();
	var label = $('#uid');
	var uid = label.attr('value');
	$.ajax({
		url: 'ajax/follow.php',
		type: 'POST',
		data: {follow_value: follow_value,uid: uid},
		success: function(data){
			//alert(data);
			if(data.trim() == 'Database query failed.'){
				//alert('You need to be logged in???/');

			} else {
			
				 $("button#follow-bt").val(data);
				 $("#follow-bt span").text(data);
				 location.reload();
				//alert(data);
			}
		}
	});

});