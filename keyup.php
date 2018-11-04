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
			<td><input type="tetx" name="uname" class="form_text" id="uname"></td><td><span  id="username_error_message"></span></td>
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
			
			<td><input type="submit" name="submit" class="submit_btan" id="submit" value="Submit"></td>
		</tr>
	</table>
	<div id="result" align="center"></div>
</form>
		
</div>
</body>
</html>

<script type="text/javascript">
			$(document).ready(function(){
				$('username_error_message').hide();
				$('password_error_message').hide();
				$('cpwd_error_message').hide();
				$('email_error_message').hide();

				var error_user = true;
				var error_pwd = true;
				var error_cpwd = true;
				var error_email = true;

				$('#uname').keyup(function(){
					check_username();

				});
				function check_username(){

					var username_length = $('#uname').val();
					//alert(username_length);

					if (username_length.length == '') {
						$('#username_error_message').show();
						$('#username_error_message').html("**Please Fill The UserName ");
						$('#username_error_message').focus();
						$('#username_error_message').css("color",'red');	
						error_user = false;
						return  false;
					
				}
				else
				{
					$('#username_error_message').hide();				
				}

				if ((username_length.length < 3 || username_length.length > 8)) {
					$('#username_error_message').show();
					$('#username_error_message').html("UserName Length Must be  3 to 10 ");
					$('#username_error_message').focus();
					$('#username_error_message').css("color",'red');
						
						error_user = false;
						return false;
					}else{
						//$('#username_error_message').css("color",'green');
						$('#username_error_message').hide();
					}
				}

				$('#form_pwd').keyup(function(){
					check_password();

				});
				function check_password(){

					var pwd = $('#form_pwd').val();
					//alert(username_length);

					if (pwd.length == '') {
						$('#password_error_message').show();
						$('#password_error_message').html("**Please Fill The Password ");
						$('#password_error_message').focus();
						$('#password_error_message').css("color",'red');	
						error_pwd = false;
						return  false;
					
				}
				else
				{
					$('#password_error_message').hide();				
				}

				if ((pwd.length < 3 || pwd.length > 8)) {
					$('#password_error_message').show();
					$('#password_error_message').html("Password Length Must be 3  to 10 ");
					$('#password_error_message').focus();
					$('#password_error_message').css("color",'red');
						
						error_pwd = false;
						return false;
					}else{
						//$('#username_error_message').css("color",'green');
						$('#username_error_message').hide();
					}

				}

				$('#form_cpwd').keyup(function(){
					check_cpassword();

				});
				function check_cpassword(){

					var pwd = $('#form_pwd').val();
					var cpwd = $('#form_cpwd').val();

					if (pwd != cpwd) {
						$('#cpwd_error_message').show();
						$('#cpwd_error_message').html("Password don't Match");
						$('#cpwd_error_message').focus();
						$('#cpwd_error_message').css("color",'red');
						
						
						error_cpwd = false;
						return false;
					}else{
						//$('#username_error_message').css("color",'green');
						$('#cpwd_error_message').hide();
					}
				}
				$('#form_email').keyup(function(){
					check_email();

				});

				function check_email(){

					var email = $('#form_email').val();
		
					if (email == '') {
						$('#email_error_message').show();
						$('#email_error_message').html("Please Fill The Email");
						$('#email_error_message').focus();
						$('#email_error_message').css("color",'red');
						error_email = false;
						return false;
					}else{
						//$('#username_error_message').css("color",'green');
						$('#email_error_message').hide();
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

		<script type="text/javascript">
	$(document).ready(function(){
		$("#show").click(function(event){
			event.preventDefault();
			$.ajax({
				type: "GET",
				url : "showdata",
				dataType: "html",
				
				success: function(result)
				{
					$("#result").html(result);
				}
			});
		});
	});
</script>