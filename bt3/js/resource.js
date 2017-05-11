$('#resadd').on('click',function(e) {
		  var pid=$('#cp').val();
		  var uid=$('#up').val();
		  var string="";
		  window.location.href = string.concat("test2.php?pid=",pid,"&uid=",uid);
      }); 