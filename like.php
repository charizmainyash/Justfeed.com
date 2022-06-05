<?php	
	echo 'tru';
	$connect=mysqli_connect("127.0.0.1","root","");
	mysqli_select_db($connect,"justfeed");
	$arrid=$_GET['arid'];
	if(mysqli_query($connect,"update article set upfeed = (select upfeed from article where articleid=$arrid)+1 where articleid=$arrid"))
		echo 'true';
	else
		echo 'false';
	
	?>
	