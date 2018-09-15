
// script to send mail
function sendMail(email,module_name,request_for){
	if (confirm("Do you really want to send mail?")) {
		console.log(email);
		console.log(module_name);
		console.log(request_for);
		switch(module_name){
			
			case 'organ':
			// send request for organ by mail
			$.ajax({
				url: BASE_URL+"user/home/sendMail", 
				type: "POST",
				data: {email:email,module_name:'An Organ',request_for:request_for},
				return: false, 
				beforeSend: function(){
					$('.mail').html('<i class="fa fa-circle-o-notch fa-spin"></i> sending');
				},
				success: function(data){
					$('#message_div').html(data);
					$('.mail').html('send mail');
					
				},
				error:function(data){
					$('#message_div').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');
					$('.mail').html('send mail');
					window.setTimeout(function() {
						$(".alert").fadeTo(500, 0).slideUp(500, function(){
							$(this).remove(); 
						});
					}, 5000);
				}
			});
			return false; 
			break;
			case 'ambulance':
			// send request for ambulance by mail
			$.ajax({
				url: BASE_URL+"user/home/sendMail", 
				type: "POST",
				data: {email:email,module_name:'An Ambulance',request_for:request_for},
				return: false, 
				beforeSend: function(){
					$('.mail').html('<i class="fa fa-circle-o-notch fa-spin"></i> sending');
				},
				success: function(data){
					$('#message_div').html(data);
					$('.mail').html('send mail');
					
				},
				error:function(data){
					$('#message_div').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');
					$('.mail').html('send mail');
					window.setTimeout(function() {
						$(".alert").fadeTo(500, 0).slideUp(500, function(){
							$(this).remove(); 
						});
					}, 5000);
				}
			});
			break;
			case 'blood':
			// send request for blood by mail
			$.ajax({
				url: BASE_URL+"user/home/sendMail", 
				type: "POST",
				data: {email:email,module_name:'a Blood',request_for:'Group '+request_for},
				return: false, 
				beforeSend: function(){
					$('.mail').html('<i class="fa fa-circle-o-notch fa-spin"></i> sending');
				},
				success: function(data){
					$('#message_div').html(data);
					$('.mail').html('send mail');
					
				},
				error:function(data){
					$('#message_div').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');
					$('.mail').html('send mail');
					window.setTimeout(function() {
						$(".alert").fadeTo(500, 0).slideUp(500, function(){
							$(this).remove(); 
						});
					}, 5000);
				}
			});
			break;
			case 'doctor':
			// send request for doctor by mail
			$.ajax({
				url: BASE_URL+"user/home/sendMail", 
				type: "POST",
				data: {email:email,module_name:'Consultancy',request_for:request_for},
				return: false, 
				beforeSend: function(){
					$('.mail').html('<i class="fa fa-circle-o-notch fa-spin"></i> sending');
				},
				success: function(data){
					$('#message_div').html(data);
					$('.mail').html('send mail');
					
				},
				error:function(data){
					$('#message_div').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');
					$('.mail').html('send mail');
					window.setTimeout(function() {
						$(".alert").fadeTo(500, 0).slideUp(500, function(){
							$(this).remove(); 
						});
					}, 5000);
				}
			});
			break;
		}
	} else {

	}
}