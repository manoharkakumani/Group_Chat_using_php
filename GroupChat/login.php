<?php
include('server.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
</head>
<body>
  <input type='checkbox' id='form-switch'>
    <center><i class="fa fa-user-circle-o" style="font-size:25px;color: #464a92;"></i></center>
<form id='login-form' action="index.php" method='post'>
  <center><span class="head">Login Form</span></center><br>
  <input type="email" placeholder="Email" name="email">
  <input type="password" placeholder="Password" name="password"><br></br>
  <center><button type='submit' name="signin_user">Login</button></center><br></br>
  <center><label for='form-switch'><span class="square">Not A Member? : Sign up</span></label><br></br><br>
    <a class="square" href="index.php?fogpass='1'">Forgot Password ?</a></center>
</form>
<form id='register-form' action="index.php" method='post'>
  <center><span class="head">Signup Form</span></center><br>
  <input type="text" placeholder="Name" name="name" required>
  <input type="email" placeholder="Email" name="email" required>
  <input type="password" placeholder="Password" name="password_1" required>
  <input type="password" placeholder="Re Password" name="password_2" required><br></br>
  <center><button type='submit' name="signup_user">Register</button></center></br>
  <center><label for='form-switch'> <span class="square">Member ? : Login</span></label></center>
</form>
<?php include('errors.php'); ?>
</body>
<style>
.head{
    padding:5px;
	font-size:20px;
	color: #464a92;
	border: none;
}
form {
  margin:0 auto;
  width:150px;
  padding-top:8px;
}
input {
  margin-bottom:3px;
  padding:10px;
  width: 100%;
  border:1px solid #CCC;
  color: #464a92;
}
button {
	position:relative;
   text-decoration:none;
	padding:8px;
	font-size:14px;
	color: white;
	background:#464a92;
	border: none;
	border-radius:2px;
	cursor:pointer;
 }
label {
  cursor:pointer;
}
.square{
   text-decoration:none;
	padding:5px;
	font-size:12px;
	color: white;
	background:#464a92;
	border: none;
	border-radius:2px;
	cursor:pointer;
}
#form-switch {
  display:none;
}
#register-form {
  display:none;
}
#form-switch:checked~#register-form {
  display:block;
}
#form-switch:checked~#login-form {
  display:none;
}

</style>
</html>
