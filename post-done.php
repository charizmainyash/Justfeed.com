<?php
session_start();
require ("checkses.php");
?>
<html>
<?php
$connect=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($connect,"JustFeed");
if(isset($_REQUEST["subp"]))
{
	
	
	
	
	$tag=$_REQUEST["tag"];
	
	
	//echo timezone_version_get();
	//date_default_timezone_set(date_default_timezone_get());
	$d = date("Y:m:d:H:i:s");
	//echo date("Y/m/d");
	//echo date("H:i:s");
	
	
	$ud=mysqli_query($connect,"select max(articleid) from article"); 
	$row=mysqli_fetch_array($ud);
	//echo$row[0];	
	$ad=$row[0]+1;
		
	
	$ar=$_REQUEST["art"];
	
	$id=$_SESSION['id'];
	$hh=$_REQUEST["title"];

	
	if(  mysqli_query($connect,"insert into article values ('$ad','$hh','$ar','$id',0,0,'$tag','$d')")  )
		mysqli_query($connect,"update users set article=article+1 where userid=$id");
	//merit
	$mer=mysqli_fetch_array(mysqli_query($connect,"select merit from users where userid=$id"));
	$newmer=$mer[0]+100;
	mysqli_query($connect,"update users set merit ='.$newmer.' where userid=$id ");
	
	$tagr=explode(" ",$tag);
	
	//$query = ;
	foreach ($tagr as $tagin)
		if(!mysqli_query($connect,"insert into tags values ('$tagin',0)"))
			mysqli_query($connect,"update tags set number=(select number from tags where tag='$tagin')+1 where tag='$tagin'");
			
	
	
}
?>
<script>
alert("Post Upload Successful");
</script>
<?php header ("Location: login.php"); ?>
</html>