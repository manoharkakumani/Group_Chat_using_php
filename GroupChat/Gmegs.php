<?php 
include('db.php');
	if (isset($_SESSION['name'])&&isset($_SESSION['email'])) {
		 $re= mysqli_query($db , "SELECT * FROM `kaburulu` ");
	     while ($row1 = mysqli_fetch_assoc($re)){
	     $u=$row1['name'];
	     $query = "SELECT * FROM `janam` WHERE  name='$u'";
         $rel= mysqli_query($db,$query);
 		$row = mysqli_fetch_assoc($rel);
		if($row1['name']==$_SESSION['name'])
	echo "<div class='msg_b'><b>You :- </b></br> &emsp;".htmlspecialchars($row1['message'])."</br><span class='time'>".$row1['time']."</span></div></br>";
           else
      echo "<div class='msg_a'><b>".$row1['name']." :-</b></br>&emsp;".htmlspecialchars($row1['message'])."</br><span class='time'>".$row1['time']."</span></div></br>";
}}?>
