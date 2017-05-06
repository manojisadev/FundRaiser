$("button#comment").click(function() {
	var username = $('button#comment').val();
	var comment = $('input#comment-text').val();
	var pid = $('#pid').attr('value');
	alert(pid);
	//  $.post('ajax/comments.php',data: {username: username,comment: comment,pid: pid}, function(data) {
	// //$.post('ajax/com.php',{pid: pid}, function(data) {
	// 	// $('div#name-data').text(data);
	// 	alert(data);
	// });

	if(comment.trim() == '') {
		alert('Need to have some comment');
	} else {
	$.ajax({
		url: 'ajax/com.php',
		type: 'POST',
		data: {username: username,comment: comment,pid: pid},
		success: function(data){
		if(data.trim() == '' ){
			alert('You need to be logged in');
		} else {
						 location.reload();
		}

	}
	});
	}
});