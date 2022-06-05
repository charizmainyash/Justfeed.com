<?php
	$conn = mysqli_connect("localhost","root","");
	if(isset($_GET['name']))
	{
		$name = $_GET['name'];
		$dob = $_GET['dob'];
		$loc = $_GET['loc'];
		$prof = $_GET['prof'];
		$mail = $_GET['email'];

		$query = "update users set name = '".$name."', age = '".$dob."', loca = '".$loc."', prof = '".$prof."' where email = '".$mail."'";
		
		mysqli_select_db($conn,"justfeed");
		if(mysqli_query($conn,$query))
			echo 'true';
		else
			echo 'false';
	}
	
	
	if(isset($_GET['uemail']))
	{
			mysqli_select_db($conn,"JustFeed");
			$mail = $_GET['uemail'];
			
			$exec = mysqli_query($conn,"SELECT count(*) from users where email = '".$mail."' ");
			$c = mysqli_fetch_array($exec);
			
			if ( $c[0]  > 0)
				echo "false";
			else
				echo "true";
	}

	if(isset($_GET['feed']))
	{
		$feed = $_GET['feed'];
		$mail = $_GET['mail'];
		$uid = $_GET['uid'];
		
		//echo $feed." ".$mail." ".$uid;

		mysqli_select_db($conn,"justfeed");

		$query = "insert into feedback (userid,email,feedback) values(".(int)$uid.",'".$mail."','".$feed."')";

		
		if(mysqli_query($conn,$query))
			echo true;
		else
			echo false;

	}
?>