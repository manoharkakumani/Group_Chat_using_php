<?php 
	$name = "";
	$email    = "";
	$errors = array();
     $msg="Code was sent to your ";
include('db.php');
// updown
if(isset($_POST['upd']))
{
	$ad=$_POST['upd'];
	if($ad==1)
	$_SESSION['updo']=0;
else
	$_SESSION['updo']=1;
}
	// REGISTER USER
	if (isset($_POST['signup_user'])) {
		// receive all input values from the form
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		//form validation: ensure that the form is correctly filled
		if (empty($name)) { array_push($errors, "NAME is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if ($password_1 != $password_2) {
		array_push($errors, "Passwords didn't matched");
		}if (mysqli_num_rows(mysqli_query($db,"SELECT * FROM janam WHERE name='$name'")) == 1){array_push($errors, "Name is already in Use");}
		if (mysqli_num_rows(mysqli_query($db,"SELECT * FROM janam WHERE email='$email'")) == 1){array_push($errors, "Email is already in Use");}
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			 $rand=rand(999,9999);
             $from='@noreplay';
             $sub="ACCOUNT VERIFICATION";
             $meg="Your CODE IS :".$rand;
        mail($email,$from,$sub,$meg);
			$password = ($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO janam (name, email, password,verify,code) 
					  VALUES('$name', '$email', '$password','0','$rand')";
		 mysqli_query($db, $query);			
			$_SESSION['email'] = $email;
			$_SESSION['verify'] = 1;
			$_SESSION['chp']=0;
			$_SESSION['success']="";
			$_SESSION['fpass']=0;
			$_SESSION['nchp']=0;
			$_SESSION['verify1']==0;
			header('location: index.php');
		}
	}
//------------------------------------------------------------------------------------------------
	// LOGIN USER
	if (isset($_POST['signin_user'])) {
		$email=mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
        
		if (empty($email)){
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0) {
			$query = "SELECT * FROM janam WHERE email='$email'AND password='$password'";
				$results = mysqli_query($db,$query);
				$row = mysqli_fetch_array($results);
		         if (mysqli_num_rows($results) == 1)
					 {
					 	$_SESSION['email'] = $row['email'];
					 	$op = $row['verify'];
					 	$_SESSION['name'] = $row['name'];
					 	if($op){
					$_SESSION['verify'] = 0;
					$_SESSION['chp']=0;
					$_SESSION['fpass']=0;
					$_SESSION['nchp']=0;
					$_SESSION['email'] = $row['email'];
					$_SESSION['success']="";
					$_SESSION['verify1']==0;
				 header('location: index.php');
				}
				else{
					$_SESSION['verify'] = 1;
					header('location: index.php');
				}
			}else {
				array_push($errors, "Wrong Email/Password combination");
			}
		}
	}
//------------------------------------------------------------------------------------------------------------
//verification of mail	
	if (isset($_POST['verify'])) {
		$email=$_SESSION['email'];
		$code= $_POST['code'];
		if (empty($code)) {
			array_push($errors, "CODE is required");
		}
		if (count($errors) == 0) {
			$query = "SELECT * FROM `janam` WHERE email='$email'AND code='$code'";
				$results = mysqli_query($db,$query);
				$row = mysqli_fetch_array($results);
		         if (mysqli_num_rows($results) == 1)
		          {				
				mysqli_query($db,"UPDATE `janam` SET `verify`='1' WHERE email='$email'");
				 $_SESSION['email'] = $row['email'];
			    	$_SESSION['verify'] = 0;
					$_SESSION['chp']=0;
					$_SESSION['fpass']=0;
					$_SESSION['nchp']=0;
					$_SESSION['email'] = $row['email'];
					$_SESSION['success']="";
					$_SESSION['verify1']==0;
				        header('location: index.php');
			}else {
				array_push($errors, "YOU ENTERED WRONG CODE");
			}
		}
	}	
if (isset($_POST['resend'])) {
		$email=$_SESSION['email'];        
		 $rand=rand(999,9999);
             $from='@noreplay';
             $sub="ACCOUNT VERIFICATION";
             $meg="Your CODE IS :".$rand;
        mail($email,$from,$sub,$meg);	
			$query = "SELECT * FROM `janam` WHERE email='$email'";
				$results = mysqli_query($db,$query);
				$row = mysqli_fetch_array($results);
		         if (mysqli_num_rows($results) == 1)
					 {
				  $_SESSION['email'] = $row['email'];				
				mysqli_query($db,"UPDATE `janam` SET `code`='$rand' WHERE email='$email'");
				    header('location: index.php');
					}
	}

//--------------------------------------------------------------------
//change email
		if (isset($_POST['chmail'])) {
		$email1=$_SESSION['email'];
		$email= mysqli_real_escape_string($db,$_POST['email']);
		if (mysqli_num_rows(mysqli_query($db,"SELECT * FROM users WHERE email='$email'")) == 1){array_push($errors, "Email is already in Use");}
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (count($errors) == 0) {		
				     mysqli_query($db,"UPDATE `users` SET `email`='$email' WHERE email='$email1'");
				        $_SESSION['email'] = $email;				
				        header('location: verify.php');
		}
	}
	
//===========================================================================
// Change password
		if (isset($_POST['chpass'])) {
		$email= $_SESSION['email'];
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$password_3 = mysqli_real_escape_string($db, $_POST['password_3']);
		// form validation: ensure that the form is correctly filled
		if (empty($password_1)) { array_push($errors, "Current Password is required"); }
        if (empty($password_2)) { array_push($errors, "New Password is required"); }
		if ($password_2 != $password_3) {array_push($errors, "The two passwords didn't matched");}
		if (count($errors) == 0) {	
		         if (mysqli_num_rows(mysqli_query($db,"SELECT * FROM janam WHERE `email`='$email' AND `password`='$password_1'")) == 1)
					 {	
					 	mysqli_query($db,"UPDATE `janam` SET `password`='$password_2'WHERE `email`='$email' AND `password`='$password_1'");
					 	$_SESSION['success']="Password is succesfully Changed";
                 header('location:index.php');
			       	}
	     else{
	     	array_push($errors, "Current Password is Wrong"); 
	     }
}
else
$_SESSION['success']="";
}

//=============================================================================
	//forgot password
		if (isset($_POST['forgotpass'])) {
		$email=mysqli_real_escape_string($db, $_POST['email']);  
		if (empty($email)) { array_push($errors, "Email is required"); }
		elseif (mysqli_num_rows(mysqli_query($db,"SELECT * FROM janam WHERE email='$email'")) == 0){array_push($errors, "Email NOT FOUND ");}	
	if (count($errors) == 0) {	
		mysqli_query($db,"UPDATE `janam` SET `verify1`='0' WHERE email='$email'");
		 $rand=rand(999,9999);
             $from='@noreplay';
             $sub="ACCOUNT VERIFICATION";
             $meg="Your CODE IS :".$rand;
           mail($email,$from,$sub,$meg);	
			$query = "SELECT * FROM janam WHERE email='$email'";
				$results = mysqli_query($db,$query);
				$row = mysqli_fetch_array($results);
		         if (mysqli_num_rows($results) == 1)
					 {
					 	$_SESSION['verify1']=1;
					 	$_SESSION['fpass']=0;
				        $_SESSION['email'] = $row['email'];				
				mysqli_query($db,"UPDATE `janam` SET `verify1`='0',`code`='$rand' WHERE email='$email'");
				    header('location: index.php');
					
					 }
				}
	}
//---------------------------------------------------------------
	if (isset($_POST['verify1'])) {
		$email=$_SESSION['email'];
		$code=$_POST['code'];
		if (empty($code)) {
			array_push($errors, "CODE is required");
		}
		if (count($errors) == 0) {
			$query = "SELECT * FROM `janam` WHERE email='$email'AND code='$code'";
				$results = mysqli_query($db,$query);
				$row = mysqli_fetch_array($results);
		         if (mysqli_num_rows($results) == 1)
				 {			
				mysqli_query($db,"UPDATE `janam` SET `verify1`='1' WHERE `email`='$email'");
				 $_SESSION['email'] = $row['email'];
				 $_SESSION['nchp']=1;
				 $_SESSION['verify1']=0;
				  header('location: index.php');
			}else {
				array_push($errors, "You Enterd Wrong Code");
			}
		}
	}
	
if (isset($_POST['resend1'])) {
		$email=$_SESSION['email'];
		$_SESSION['verify1']=1;        
		 $rand=rand(999,9999);
             $from='@noreplay';
             $sub="ACCOUNT VERIFICATION";
             $meg="Your CODE IS :".$rand;
       mail($email,$from,$sub,$meg);	
			$query = "SELECT * FROM `janam` WHERE email='$email'";
				$results = mysqli_query($db,$query);
				$row = mysqli_fetch_array($results);
		         if (mysqli_num_rows($results) == 1)
					 {
				  $_SESSION['email'] = $row['email'];				
				mysqli_query($db,"UPDATE `janam` SET `code`='$rand' WHERE email='$email'");
				    header('location: index.php');
					}
	}

	//-----------------------------------------------------------------------------------------------------
	
	
	//  Forgot change password
		if (isset($_POST['chpass1'])) {
		$email= $_SESSION['email'];
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		// form validation: ensure that the form is correctly filled
		if (empty($password_1)) { array_push($errors, "NEW Password is required"); }
		if ($password_2 != $password_1) {array_push($errors, "The two passwords didn't matched");	}
		if (count($errors) == 0) {	
		         if (mysqli_num_rows(mysqli_query($db,"SELECT * FROM janam WHERE `email`='$email'")) == 1)
					 {	
				 $_SESSION['nchp']=0;
				 mysqli_query($db,"UPDATE `janam` SET `password`='$password_1'WHERE `email`='$email' ");
                 header('location: index.php');
			       	}
}}
?>
