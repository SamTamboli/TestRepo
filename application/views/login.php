<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <style>
  .error
  {
	  color: red;
  }
  </style>
</head>
<body>

	<div id="container">
		<h1>Login</h1>
		<div id="msg">
		
		</div>
		<form action="/test/Employee/userlogin" method="post" id="loginform">
			  <div class="form-group col-md-6 offset-md-3">
				<label for="email">User Name:</label>
				<input type="text" class="form-control" id="uname" name="uname">
			  </div>
			  <div class="form-group col-md-6 offset-md-3">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="pwd" name="pwd">
			  </div>
				 <div class="col-md-6 offset-md-3">
				<button type="submit" class="btn btn-primary submit">Submit</button>
				</div>
		</form>	
	
	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<script>
	$(document).ready(function(){
		$("#loginform").validate({
			rules:{
				uname: "required",
				pwd: "required"
			},
			messages: {
				uname: "Please enter user name",
				pwd: "Please enter password"
			},
			
			 submitHandler: function(form,event)
			{
				event.preventDefault();
				var url=$(form).attr('action');
				var data=$(form).serialize();
				var btn_text=$(form).find('.submit').html();
				$.ajax({
					type: "POST",
					url: url,
					data: data,
					beforeSend: function() {
						$(form).find('.submit').html('Processing <i class="fa fa-spinner fa-spin"></i>');
						$(form).find('.submit').prop('disabled','true');
					},
					success: function(msg)
					{
						var msg=JSON.parse(msg);
						console.log(msg);
						if(msg.status=='success')
						{
							var html="Login Successfully";
							$("#msg").html(html);
							window.location.href='/test/Employee/allemployee';
						}
						else
						{
							var html="Invalid Username Or Password";
							$("#msg").html(html);
							window.location.href='/test/Employee/index';

						}
					}
				});
				
			} 
		});
	});
	</script>
</body>
</html>