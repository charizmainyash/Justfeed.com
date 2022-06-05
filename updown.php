<?php
	

	session_start();
	//Save
	if(isset($_GET['sav']))
	{
		
		$connect = mysqli_connect("localhost","root","");
		mysqli_select_db($connect,"justfeed");
		
		if($_GET['savp'] == 'green')
		{
			$naya=array();
			$corr=array();
			$test=array(" ");
			$corrs="";
			$purana = mysqli_fetch_array(mysqli_query($connect,"select saved from users where userid = ".$_SESSION['id']." "));	
			$naya=explode(" ",$purana[0]);	
			//echo$naya[3];
			for($i=0 ; $i<count($naya) ; $i++)
			{
				if($naya[$i] != $_GET['sart'])
				{
					if($naya[$i] != ctype_space($naya[$i]))
					array_push($corr,$naya[$i]);
					
				}
				
				
			}
			
			//echo$corr[1];
			$corrs=implode(" ",$corr);
			if($corrs != null)
			$corrs=" ".$corrs;
			//echo$corrs;
			mysqli_query($connect,"update users set saved  = '".$corrs."' where userid = ".$_SESSION["id"]." ");
			echo false;
	
		    //echo"Article Already Saved!";
		}
			
		//Already saved code
		else
		{
			$purana = mysqli_fetch_array(mysqli_query($connect,"select saved from users where userid = ".$_SESSION['id']." "));
			$ar1 = $_GET['sart'];
			$ar11 = $purana[0]." ".$ar1;
			mysqli_query($connect,"update users set saved  = '".$ar11."' where userid = ".$_SESSION["id"]." ");
			echo true;
		}
	}
	
	
	
	// Upfeed
	if(isset($_GET['upfeed']))
	{
		$connect = mysqli_connect("localhost","root","");
		mysqli_select_db($connect,"justfeed");

		if($_GET['prev'] == 'upfeed')
		{
			$queryup = "update article set upfeed = upfeed-1 where articleid =".$_GET['article'];
			$q1up = mysqli_query($connect,$queryup);
			//Merit Undo	
				$artforuser =$_GET['article'];
				$usee=mysqli_fetch_array(mysqli_query($connect,"select userid from article where articleid like '$artforuser' "));
				$mer=mysqli_fetch_array(mysqli_query($connect,"select merit from users where userid = '".$usee[0]."' "));
				$newmer=$mer[0]-10; 
				mysqli_query($connect,"update users set merit = '$newmer'where userid = '".$usee[0]."' ");
			//Remove Upfeed from database	
			$queryup2 = 'select upfeed from users where userid = '.$_SESSION["id"];
			$q2up2 = mysqli_fetch_array(mysqli_query($connect,$queryup2));
			$data = $q2up2[0];
			$reg = "/[\s]".$artforuser."[\s]/";	// RegEx to match exiting articleid in downfeed collumn
			$data = preg_replace($reg,"", $data);		// To delete string with matching pattern
			$query = 'update users set upfeed = "'.$data.'" where userid = '.$_SESSION["id"];
			mysqli_query($connect,$query);	
			
			echo '-1 ';
			//Cancel UpFeed
		}
		else
		{
			$query = "update article set upfeed = upfeed+1 where articleid =".$_GET['article'];
			$q1 = mysqli_query($connect,$query);
			$query = 'select upfeed from users where userid = '.$_SESSION["id"];
			$q2 = mysqli_fetch_array(mysqli_query($connect,$query));
			$data = $q2[0].' '.$_GET['article'].' ';
			$query = 'update users set upfeed = "'.$data.'" where userid = '.$_SESSION["id"];
			$q2 = mysqli_query($connect,$query);
			
			
			if($q1 && $q2)
			{
				//Merit plus
			
				$artforuser =$_GET['article'];
				$usee=mysqli_fetch_array(mysqli_query($connect,"select userid from article where articleid like '$artforuser' "));
				$mer=mysqli_fetch_array(mysqli_query($connect,"select merit from users where userid = '".$usee[0]."' "));
				$newmer=$mer[0]+10; 
				mysqli_query($connect,"update users set merit = '$newmer'where userid = '".$usee[0]."' ");
				
				echo '1 ';
			}
			else
				echo '0 ';
		}

		if($_GET['prev'] == "downfeed" && $q1 && $q2)
		{
			$query = 'update article set downfeed = downfeed-1 where articleid = '.$_GET["article"];
			$q1 = mysqli_query($connect,$query);
			$query = 'select downfeed from users where userid = '.$_SESSION["id"];
			$q2 = mysqli_fetch_array(mysqli_query($connect,$query));
			$data = $q2[0];
			$reg = "/[\s]".$_GET["article"]."[\s]/";	// RegEx to match exiting articleid in downfeed collumn
			$data = preg_replace($reg,"", $data);		// To delete string with matching pattern
			$query = 'update users set downfeed = "'.$data.'" where userid = '.$_SESSION["id"];
			mysqli_query($connect,$query);
		}
		$query = "select upfeed,downfeed from article where articleid = ".$_GET['article'];
		$q1 = mysqli_fetch_array(mysqli_query($connect,$query));
		echo $q1[0]." ".$q1[1];
	}


	// Downfeed 
	if(isset($_GET['downfeed']))
	{	
		$connect = mysqli_connect("localhost","root","");
		mysqli_select_db($connect,"justfeed");

		if($_GET['prev'] == 'downfeed')
		{
			$queryup = "update article set downfeed = downfeed-1 where articleid =".$_GET['article'];
			$q1up = mysqli_query($connect,$queryup);
			//Merit Undo	
				$artforuser =$_GET['article'];
				$usee=mysqli_fetch_array(mysqli_query($connect,"select userid from article where articleid like '$artforuser' "));
				$mer=mysqli_fetch_array(mysqli_query($connect,"select merit from users where userid = '".$usee[0]."' "));
				$newmer=$mer[0]+10; 
				mysqli_query($connect,"update users set merit = '$newmer'where userid = '".$usee[0]."' ");
			//Remove Downfeed from database	
			$queryup2 = 'select downfeed from users where userid = '.$_SESSION["id"];
			$q2up2 = mysqli_fetch_array(mysqli_query($connect,$queryup2));
			$data = $q2up2[0];
			$reg = "/[\s]".$artforuser."[\s]/";	// RegEx to match exiting articleid in downfeed collumn
			$data = preg_replace($reg,"", $data);		// To delete string with matching pattern
			$query = 'update users set downfeed = "'.$data.'" where userid = '.$_SESSION["id"];
			mysqli_query($connect,$query);	
			
			echo '-1 ';
			//Cancel DownFeed
		}
		else
		{
			$query = "update article set downfeed = downfeed+1 where articleid =".$_GET['article'];
			$q1 = mysqli_query($connect,$query);
			$query = 'select downfeed from users where userid = '.$_SESSION["id"];
			$q2 = mysqli_fetch_array(mysqli_query($connect,$query));
			$data = $q2[0].' '.$_GET['article'].' ';
			$query = 'update users set downfeed = "'.$data.'" where userid = '.$_SESSION["id"];
			$q2 = mysqli_query($connect,$query);
			if($q1 && $q2)
			{
				
				//Merit minus
			
				$artforuser =$_GET['article'];
				$usee=mysqli_fetch_array(mysqli_query($connect,"select userid from article where articleid like '$artforuser' "));
				$mer=mysqli_fetch_array(mysqli_query($connect,"select merit from users where userid = '".$usee[0]."' "));
				$newmer=$mer[0]-10; 
				mysqli_query($connect,"update users set merit = '$newmer'where userid = '".$usee[0]."' ");
				echo '1 ';
			}
			else
				echo '0 ';
		}

		if($_GET['prev'] == "upfeed" && $q1 && $q2)
		{
			$query = 'update article set upfeed = upfeed-1 where articleid = '.$_GET["article"];
			$q1 = mysqli_query($connect,$query);
			$query = 'select upfeed from users where userid = '.$_SESSION["id"];
			$q2 = mysqli_fetch_array(mysqli_query($connect,$query));
			$data = $q2[0];
			$reg = "/[\s]".$_GET["article"]."[\s]/";	// RegEx to match exiting articleid in upfeed collumn
			$data = preg_replace($reg,"", $data);		// To delete string with matching pattern
			$query = 'update users set upfeed = "'.$data.'" where userid = '.$_SESSION["id"];
			mysqli_query($connect,$query);
		}
		$query = "select upfeed,downfeed from article where articleid = ".$_GET['article'];
		$q1 = mysqli_fetch_array(mysqli_query($connect,$query));
		echo $q1[0]." ".$q1[1];
	}
?>