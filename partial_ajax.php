<?php
	session_start();

	if(isset($_GET['last']))
	{
		usleep(250000);
		$connect = mysqli_connect("localhost","root","");
		mysqli_select_db($connect,"justfeed");
		$main_query = '';

		// Only add id and edit main_query
		if($_GET['id'] == 1)
			$main_query = "select * from article order by uploadtime desc";
		if($_GET['id'] == 2)
		{
			$tagname = $_SESSION['tagname'];
			$main_query = "select * from article where tags like '$tagname' order by uploadtime desc";
		}

		$query = $main_query." LIMIT ".$_GET['last'].",1";
		$articles = mysqli_fetch_array(mysqli_query($connect,$query));
		
		

		if($articles) 
		{
			$naam=mysqli_query($connect,"select name from users where userid='".$articles[3]."'");
			$naamarr=mysqli_fetch_array($naam);
		
			$output = "<div class = 'feed' onclick= 'show(".$articles[0].");'>
							<b id='aid'>	".$articles[0]."<br></b>
							<b id='tt'>		".$articles[1]."<br></b><br><br>
							<b id='taag'>	Tagged As:&nbsp;".$articles[6]."<br></b>
							<b id='naa'>	By:&nbsp;".$naamarr[0]."</b><br>
						</div>";
		}
		else
		{
			$output = "We are done";
		}
		

		echo $output;
	}
?>