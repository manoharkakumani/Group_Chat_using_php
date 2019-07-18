<?php
include('db.php');
	if (isset($_SESSION['name'])&&isset($_SESSION['email'])) {	
	date_default_timezone_set('Asia/Calcutta');
	$date=date('d/m/Y - h:i:s A');	
$name=$_SESSION['name'];
$meg=$_POST['meg'];
echo $meg;
$result = mysqli_query($db,"INSERT INTO `kaburulu`(`name`, `message`, `time`) VALUES ('$name','$meg','$date')");
 }?>