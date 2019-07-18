<?php
include('server.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
</head>
<body>
<form id='login-form' action="index.php" method='post'>
  <center><span class="head">Email</span></center><br></br> 
  <input type="email" placeholder="Email" name="email"><br></br>
  <center><button type='submit' name="forgotpass">Find</button></center><br></br>
  <center><a class="square" href='index.php?back='1''>Back</a></center>
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
