<?php
include('server.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
</head>
<body>
<form id='register-form' action="index.php" method='post'>
  <center><span class="head">Change Password</span></center><br>
  <input type="password" placeholder="Password" name="password_1">
  <input type="password" placeholder="Re Password" name="password_2">
  <center><button type='submit' name="chpass1">Change</button></center></br>
  </form>
<?php include('errors.php');
?>
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
  width:180px;
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
</style>
</html>
