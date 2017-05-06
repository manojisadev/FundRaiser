$("button#proj-crt").on('click', function() {


	var projName = $('#project-name').val();
	var cid = $('#cid-bt').val();
	var projDesc = $( '#project-desc' ).val();
	var end_date = $('#end-date').val();
	var project_comp = $('#project-comp').val();
	var min_money = $('#min-money').val();
	var max_money = $('#max-money').val();

	var timestamp = new Date(end_date);
	var timestamp1 = new Date(project_comp);
	if((!(timestamp.toString() === "Invalid Date")) && (!(timestamp1.toString() === "Invalid Date"))){
		var end_date = new Date(end_date).toISOString().substring(0, 10);
		var project_comp = new Date(project_comp).toISOString().substring(0, 10);
		$.ajax({
			url: 'ajax/new-proj.php',
			type: 'POST',
			data: {cid: cid,Pname: projName,Pdescription: projDesc,Plast_date: end_date,Pproj_date: project_comp,Pmin_price: min_money,Pmax_price: max_money},
			success: function(data){
				// if(data.trim() == 'Database query failed.'){
				// 	alert('Failed');
				// } else {
				// 	location.reload();
				// 	alert('Successfully placed');
				// }

				alert(data);
			}
		});
	} else {
		alert("Check Input");
	}
});