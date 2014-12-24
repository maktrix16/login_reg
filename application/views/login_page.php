<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login/Registration</title>
	<style type="text/css">
		.container{width:700px; font-family: arial;}
		h1{font-size:16px;}
		h2{font-size: 18px;}
		.title-link{font-size:12px; float: right;}
		.form-row{display: block; margin-bottom: 10px;}
		.error{color:red;display:block; font-size:10px;}
		.register,.login{
			display:inline-block;
			vertical-align: top;
			width:300px;
			border:1px solid gray;
			padding:10px;
		}
		.btn{margin:0px 0px 0px 180px;}
	</style></head>
<body>

<?php 
// var_dump($this->session->all_userdata()); die();

// Check if session data for user_id already exists. If so, just automatically login to main page
$user_id=$this->session->userdata('user_id');
if (!empty($user_id)){
	redirect('/main');
}
// Otherwise run the rest of the PHP code on form validation to output errors if there are any. 
else {
	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	echo validation_errors();
}
?>

<div class="container">
	<h1>Welcome!</h1>
	<div class='register'>
		<h2>Register</h2>
		<form action='/users/register' method='post'>
			<div class='form-row'>Name: <input type='text' name='name' value='Arthur'></div>
			<div class='form-row'>Email: <input type='text' name='email_reg' value='arthur.t.mak@gmail.com'></div>
			<div class='form-row'>Password: <input type='password' name='password_reg' value='12345678'></div>
			<div class='form-row'>Confirm PW: <input type='password' name='passconf' value='12345678'></div>
			<div class='form-row'>Date of Birth: <input type='date' name='birthday' value='16/05/1983'></div>
			<input type='hidden' name='action' value='register'>
			<input class='btn' type='submit' value='Register'>
		</form>
	</div> <!-- end of register div -->
	<div class='login'>
		<h2>Signin</h2>
		<form action='/users/login' method='post'>
			<div class='form-row'>Email: <input type='text' name='email_login'</div>
			<div class='form-row'>Password: <input type='password' name='password_login'></div>
			<input type='hidden' name='action' value='signin'>
			<input class='btn' type='submit' value='Login'>
		</form>
	</div>

</div> <!-- end of container div -->
</body>
</html>