<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="workaraea">
	<h1 align="center">Create Account</h1>
	<form id="reg_form" action="" method="POST">
	<table align="center">
		<tr>
			<td>UserName</td>
			<td><input type="tetx" name="uname" class="form_text" id="form_uname"></td><td><span class="error_form" id="username_error_message"></span></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="tetx" name="pwd" class="form_text" id="form_pwd"></td><td><span class="error_form" id="password_error_message"></span></td>
		</tr>
		<tr>
			<td>Retype-Password</td>
			<td><input type="tetx" name="cpwd" class="form_text" id="form_cpwd"></td><td><span class="error_form" id="cpwd_error_message"></span></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="tetx" name="email" class="form_text" id="form_email"></td><td><span class="error_form" id="email_error_message"></span></td>
		</tr>
		<tr>
			
			<td><input type="submit" name="submit" class="submit_btan" id="Submit" value="Submit"></td>
		</tr>
	</table>
		
</div>
</body>
</html>

<script type="text/javascript">
			$(document).ready(function(){
				$('username_error_message').hide();
				$('password_error_message').hide();
				$('cpwd_error_message').hide();
				$('email_error_message').hide();

				var error_user = false;
				var error_pwd = false;
				var error_cpwd = false;
				var error_email = false;

				$('#form_uname').focusout(function(){
					check_username();

				});
				$('#form_pwd').focusout(function(){
					check_password();

				});
				$('#form_cpwd').focusout(function(){
					check_cpassword();

				});
				$('#form_email').focusout(function(){
					check_email();

				});


				function check_username(){

					var username_length = $('#form_uname').val().length;

					if (username_length < 5 || username_length >20) {
						$('#username_error_message').css("color",'red');
						$('#username_error_message').html("Should be between  5-20 character");
						$('#username_error_message').show();
						error_user = true;
					}else{
						//$('#username_error_message').css("color",'green');
						$('#username_error_message').hide();
					}
				}
				function check_password(){

					var password_length = $('#form_pwd').val().length;

					if (password_length < 8) {
						$('#password_error_message').css("color",'red');
						$('#password_error_message').html("At least 8 character");
						$('#password_error_message').show();
						error_pwd = true;
					}else{
						//$('#username_error_message').css("color",'green');
						$('#password_error_message').hide();
					}
				}

				function check_cpassword(){

					var password = $('#form_pwd').val();
					var retype_password = $('#form_cpwd').val();

					if (password != retype_password) {
						$('#cpwd_error_message').css("color",'red');
						$('#cpwd_error_message').html("Password don't Match");
						$('#cpwd_error_message').show();
						error_cpwd = true;
					}else{
						//$('#username_error_message').css("color",'green');
						$('#cpwd_error_message').hide();
					}
				}

				function check_email(){

				var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
						
				if (pattern.test($('#form_email').val())) {
					$('#email_error_message').hide();
				}
				else {
					$('#email_error_message').html("Invalid Email address");
					$('#email_error_message').css('color','red');
					$('#email_error_message').show();
					email_val = true;
				}
				}

				// $('#reg_form').submit(function(){

				// 	error_user = false;
				// 	error_pwd = false;
				// 	error_cpwd = false;
				// 	error_email = false;

				// 	check_username();
				// 	check_password();
				// 	check_cpassword();
				// 	check_email();

				// 	if (error_user == false && error_pwd == false && error_cpwd == false && error_email) {
				// 		return true;
				// 	}else{
				// 		return false;
				// 	}

				// });

			});
		</script>