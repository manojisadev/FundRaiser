$("button#add-mbm").on('click', function() {

	var email = $('#mbm-email').val();

	var pid = $('#pid-bt').val();
	alert(email);


	$.ajax({
		url: 'ajax/add-team.php',
		type: 'POST',
		data: {email: email,pid: pid},
		success: function(data){
		// if(data.trim() == 'Database query failed.'){
		// 	alert('You need to be logged in???/');
		// } else { 
		// 	alert('Success');
		// }
		location.reload();	
		alert(data);
	}
	});





});

$("button#team-delete").on('click',function() {
	var pid =  ($(this).attr("value"));
	var uid = $('#uid').val();
	//alert(uid);

	$.ajax({
			url: 'ajax/delete-member.php',
			type: 'POST',
			data: {pid: pid, uid: uid},
			success: function(data){
			location.reload();				
			alert(data);
		}
		});

});
