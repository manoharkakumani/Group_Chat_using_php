<?php
if (session_id() == "")
  session_start();
if (!isset($_SESSION['fpass']))
	$_SESSION['fpass']=0;
if(!isset($_SESSION['verify1']))
	$_SESSION['verify1']=0;
if(!isset($_SESSION['nchp']))
	$_SESSION['nchp']=0;
if(!isset($_SESSION['updo']))
	$_SESSION['updo']=1;
if(!isset($_SESSION['idno']))
	$_SESSION['idno']=1;
$db = mysqli_connect('localhost', 'root', '', 'login');
?>