$('document').ready(function() { 
	/* handling form validation */
	$("#login-form").validate({
		rules: {
			password: {
				required: true,
			},
			user_email: {
				required: true,
				email: false
			},
		},
		messages: {
			password:{
			  required: "<span style='color:#66ff99;'>please enter your pin number!!</span>"
			 },
			user_email: "<span style='color:#66ff99;'>please enter your serial number!!</span>",
		},
		submitHandler: submitForm	
	});	   
	$("#verify-email").validate({
		rules: {
			verify_email: {
				required: true,
				email: false
			},
		},
		messages: {

			verify_email: "<span style='color:#66ff99;'>please enter your serial number!!</span>",
		},
		submitHandler: verifyEmail	
	});	   
	/* Handling login functionality */
	function submitForm() {		
		var data = $("#login-form").serialize();				
		 $.ajax({				
			type : 'POST',
			url  : 'stage1.php',
			data : data,
			beforeSend: function(){	
				$("#error").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
		success : function(response){	
		    console.log(response);
				if(response=="ok"){									
					$("#login_button").html('<img src="js/ajax-loader.gif" /> &nbsp; Loading Stage 2 ...');
					setTimeout(' window.location.href = "verify_email.php"; ',3000);
				} 
				else if(response=="member"){									
					$("#login_button").html('<img src="js/ajax-loader.gif" /> &nbsp; Signing In ...');
					setTimeout(' window.location.href = "summary.php"; ',3000);
				}
				else if(response=="user"){									
					$("#login_button").html('<img src="js/ajax-loader.gif" /> &nbsp; Signing In ...');
					setTimeout(' window.location.href = "user.php"; ',3000);
				}else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
						$("#login_button").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
					});
				}
			}
		});
		return false;
	}   
	function verifyEmail() {		
		var data = $("#verify-email").serialize();	
		console.log({data});	
		return;		
		 $.ajax({				
			type : 'POST',
			url  : 'stage1.php',
			data : data,
			beforeSend: function(){	
				$("#error").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
		success : function(response){	
		    console.log(response);
				if(response=="ok"){									
					$("#login_button").html('<img src="js/ajax-loader.gif" /> &nbsp; Loading Stage 2 ...');
					setTimeout(' window.location.href = "biodata.php"; ',3000);
				} 
				else if(response=="member"){									
					$("#login_button").html('<img src="js/ajax-loader.gif" /> &nbsp; Signing In ...');
					setTimeout(' window.location.href = "summary.php"; ',3000);
				}
				else if(response=="user"){									
					$("#login_button").html('<img src="js/ajax-loader.gif" /> &nbsp; Signing In ...');
					setTimeout(' window.location.href = "user.php"; ',3000);
				}else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
						$("#login_button").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
					});
				}
			}
		});
		return false;
	}   
});