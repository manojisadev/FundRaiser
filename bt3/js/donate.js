$("button#donate-bt").on('click', function() {
	var label = $('#pid-label');
	var pid = label.attr('value');
	var uid = $('#donate-bt').val();
	var CNID = $( "#cnid-bt" ).val();
	var Amount = $('#Amount').val();

	// alert(pid);
	// alert(uid);
	// alert(CNID);
	// alert(Amount);

	$.ajax({
		url: 'ajax/donation-processing.php',
		type: 'POST',
		data: {uid: uid,pid: pid,CNID: CNID,Amount: Amount},
		success: function(data){
			if(data.trim() == 'Database query failed.'){
				alert('Failed');
			} else {
				location.reload();
				alert('Successfully placed');
			}

		}
	})

})