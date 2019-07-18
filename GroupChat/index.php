<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>CHAT</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.7">
    <meta name="description" content="">
    <meta name="author" content="">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
include('db.php');
//htmlspecialchars()
if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		unset($_SESSION['chp']);
		unset($_SESSION['fpass']);
		unset($_SESSION['success']);
		unset($_SESSION['nchp']);
		unset($_SESSION['verify1']);
		unset($_SESSION['verify']);
		unset($_SESSION['updo']);
		header("location: index.php");
	}
if (isset($_GET['chpa'])) {
		$_SESSION['chp']=1;
		header("location: index.php");
	}
if (isset($_GET['fogpass'])) {
		$_SESSION['fpass']=1;
		header("location: index.php");
	}
if (isset($_GET['back'])) {
	    $_SESSION['success']="";
		$_SESSION['chp']=0;
		$_SESSION['nchp']=0;
	    $_SESSION['fpass']=0;
		header("location: index.php");
	}
if (isset($_GET['back1'])) {
	   $email=$_SESSION['email'];
	    mysqli_query($db,"UPDATE `janam` SET `verify1`='1' WHERE `email`='$email'");
	    unset($_SESSION['email']);
		$_SESSION['chp']=0;
		$_SESSION['nchp']=0;
	    $_SESSION['fpass']=0;
	    $_SESSION['verify1']=0;
		header("location: index.php");
	}
 if (($_SESSION['fpass']==1)||($_SESSION['verify1']==1)||($_SESSION['nchp']==1)) {
		echo"";
	}
	else if (!isset($_SESSION['name'])) {
		echo "";		
}
else if(($_SESSION['verify'] == 1)&&isset($_SESSION['name'])){
	echo "";	
}
else if($_SESSION['chp']==1){
	echo "";
}           		
else{
echo" <script class='chill'>
    	var mid=0;
    	$(document).ready(function(){
		$('.msg_input').keypress(
    function(e){
        if (e.keyCode == 13) {
            e.preventDefault();
            var msg = $(this).val().trim();
			if(msg!='')
			{

			$.post('gmgs.php',{meg:msg},
				function(data,status)
                 {   

                 });
   }
$(this).val('');
}
    });
function rip(){
                 if(mid < document.getElementById('hai').innerHTML)
                 {  
                   mid=document.getElementById('hai').innerHTML;     
                $('.msg_body').stop().animate({ scrollTop: $('.msg_body')[0].scrollHeight},0);

                  }         
}
setInterval(function(){
    	rip();
    	$('.msg_push').load('Gmegs.php').fadeIn('slow');
    $('#hai').load('rip.php');
   
  },100);
});
</script>" ;
} ?>
<script type="text/javascript">
	$(document).ready(function(){
	<?php 
if($_SESSION['updo']==1)
{
echo"$('.msg_wrap').show();";
}
else{
 echo "$('.msg_wrap').hide();";
}
	?>	
	$('.msg_head').click(function(){
		$('.msg_wrap').slideToggle('slow');
		var d=document.getElementById('k').innerHTML;
		if(d=='▲')
		{
			$('#k').html('▼');
			var updo=0;
			$.post('server.php',{upd:updo},
				function(data,status)
                 {  
                 });
		}
		else if(d=='▼')
		{
			$('#k').html('▲');
			var updo=1;
			$.post('server.php',{upd:updo},
				function(data,status)
                 {   
                 });

		}
	});

});
	 function showDropdown() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }

</script>
  </head>
  <body>
  	<div id='hai' style="visibility:hidden;"></div>
<div class="msg_box" style="right:10px">
	<div class="msg_head" align="center"><i class="fa fa-comments" style= "color:white; cursor: pointer; position:absolute;top:12px;left:15px; font-size:23px;"></i> Group Chat 
	<div style="color:white; cursor: pointer; position:absolute;top:12px;right:40px; font-size:23px;"
	 id='k'><?php 
if($_SESSION['updo']==1)
{
echo"▼";
}
else{
 echo"▲";}
	?></div>
</div>
	<div class="msg_wrap">
		<?php 
		include('server.php');
		 if (($_SESSION['fpass']==1)||($_SESSION['verify1']==1)||($_SESSION['nchp']==1)) {
		echo"";
	} elseif (!isset($_SESSION['name']))
                		echo "";
                	elseif(($_SESSION['verify'] == 1)&&isset($_SESSION['name']))
                		echo "<div onclick='showDropdown()' style=' color:white; cursor: pointer; position:absolute;top:8px;right:20px; font-size:30px;'id='dots'>
	&vellip;</div>
	<div id='myDropdown' class='dropdown-content'>
                         <a href='index.php?logout='1'' class='fa'>&#xf08b;Logout</a>
                    </div>";
                    elseif($_SESSION['chp'] == 1)
                    	echo"<div onclick='showDropdown()' style=' color:white; cursor: pointer; position:absolute;top:8px;right:20px; font-size:30px;'id='dots'>
	&vellip;</div>
	<div id='myDropdown' class='dropdown-content'>
                        <a href='index.php?back='1''>Back</a>
                        <a href='index.php?logout='1'' class='fa'>&#xf08b;Logout</a>
                    </div>";
                	else
                		echo"<div onclick='showDropdown()' style=' color:white; cursor: pointer; position:absolute;top:8px;right:20px; font-size:30px;'id='dots'>
	&vellip;</div>
	<div id='myDropdown' class='dropdown-content'>
                        <a href='index.php?chpa='1''>Change Password</a>
                         <a href='index.php?logout='1'' class='fa'>&#xf08b;Logout</a>
                    </div>";
                	
				 ?>
		
		<div class="msg_body">	
			<div class="msg_push">
				<?php 
				if ($_SESSION['fpass']==1)
		                include("forgot.php");
		           elseif ($_SESSION['verify1']==1) 
		           	include("verify1.php");
		           elseif ($_SESSION['nchp']==1) 
		           	include("chpass1.php");
		            elseif (!isset($_SESSION['name']))
                		include('login.php');
                	elseif(($_SESSION['verify'] == 1)&&isset($_SESSION['name']))
                		include('verify.php');
                	elseif($_SESSION['chp']==1)
                		include('chpass.php');
                	else
                		include('Gmegs.php');
				 ?>				
			</div>
		</div>
	<div class="msg_footer"><textarea class="msg_input" rows="4" placeholder="Message...."></textarea></div>
</div>
</div>
</body>
<style type="text/css">
.msg_body::-webkit-scrollbar {
  width: 5px;
}
.msg_body::-webkit-scrollbar-thumb {
  background: #464a92;
}
.msg_input::-webkit-scrollbar {
  width: 5px;
}
.msg_input::-webkit-scrollbar-thumb {
  background: #464a92;
}
body{
	margin:0px;
	font-family: sans-serif;
}
.msg_head{
	background-color:#464a92;
	color:white;
	padding:15px;
	font-weight:bold;
	cursor:pointer;
	border-radius:5px 5px 0px 0px;
}
.msg_box{
	position:fixed;
	bottom:5px;
	width:250px;
	background:white;
	border-radius:5px 5px 0px 0px;
}
.msg_body{
	background:#f4f7f9;
	height:350px;
	font-size:12px;
	padding:15px;
	overflow:auto;
	overflow-x: hidden;
	background-opacity:0.1; 
	border-left:2px solid #464a92;
	border-right:2px solid #464a92;
}

.msg_input{
	background:#f4f7f9;
	width:250px;
	max-width: 250px;
	min-width: 250px; 
	min-height:40px;
	max-height: 40px; 
	border:2px solid #464a92;
	border-top:0.5px solid #464a92;
	-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
	-moz-box-sizing: border-box;    /* Firefox, other Gecko */
	box-sizing: border-box;  
}

.msg_a{
	position:relative;
	background:#FDE4CE;
	padding:10px;
	max-width: 120px;
	min-height:10px;
	margin-bottom:5px;
	margin-right:10px;
	border-radius:8px;
	word-wrap: break-word;
}
.msg_a:before{
	content:"";
	position:absolute;
	width:0px;
	height:0px;
	border: 10px solid;
	border-color: transparent #FDE4CE transparent transparent;
	left:-20px;
	top:7px;
}


.msg_b{
	background:#EEF2E7;
	padding:10px;
	max-width: 120px;
	min-height:15px;
	margin-bottom:5px;
	position:relative;
	margin-left:10px;
	border-radius:8px;
	left:60px;
	word-wrap: break-word;
}
.msg_b:after{
	content:"";
	position:absolute;
	width:0px;
	height:0px;
	border: 10px solid;
	border-color: transparent transparent transparent #EEF2E7;
	right:-20px;
	top:7px;
}
.time
{
	font-size:9px; 
	color:#464a92;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  width: 170px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  right: 0px;
  border:2px solid #464a92;
}

.dropdown-content a {
  float: none;
  color: #464a92;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}
.dropdown-content a:hover {
  background-color: #ddd;
}
  .show {display:block;}
</style>
</html>
