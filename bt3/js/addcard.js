$("button#add-card").on('click', function() {

	var username = $('button#add-card').val();
	var OwnerName = $('#owner-name').val();
	var CreditNumber = $('#card-number').val();
	var CVVNumber = $('#cvv').val();
	var ExpirationDate = $('#exp-date').val();
	var timestamp = new Date(ExpirationDate);
	var ExpirationDate = new Date(ExpirationDate).toISOString().substring(0, 10);
	if((!(timestamp.toString() === "Invalid Date")) && $.isNumeric(CVVNumber) && $.isNumeric(CreditNumber) && (CVVNumber.length == 3) && (CreditNumber.length == 16)){

		$.ajax({
			url: 'ajax/add-card.php',
			type: 'POST',
			data: {username: username,OwnerName: OwnerName,CreditNumber: CreditNumber,CVVNumber: CVVNumber,ExpirationDate: ExpirationDate},
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




	} else {
		alert('Please enter correct input');
	}


});

$("button#card-delete").on('click',function() {
	var CNID =  ($(this).attr("value"));
	$.ajax({
			url: 'ajax/delete-card.php',
			type: 'POST',
			data: {CNID: CNID},
			success: function(data){
			location.reload();				
			alert(data);
		}
		});

})
