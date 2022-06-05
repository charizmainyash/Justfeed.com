<?php
session_start();
require ("checkses.php");
?>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> JF | About </title>
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="contact.css">
<style>
#btn1
{
	font-size:160%;
	font-family:Times New Roman;
	color: darkred;
}
	
</style>
</head>

<body>
<?php
//echo$_SESSION['mail'];
$connect=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($connect,"JustFeed");

$dat=mysqli_query($connect,"select * from users where userid = '".$_SESSION['id']."' ");
$data=mysqli_fetch_array($dat);
?>

<?php include "nav.html"; ?>

<div id="mainfeed"><div style="background-color: rgb(0,0,0,60%);width:100%;height:100%;">
	<div id="contact_box">
		<input type="button" value="About JustFeed" class="btn" id="btn1" style="width:100%;" /><br>
		
		<div class="detail" id="contact" style="padding:1%">
			<br>
			JustFeed is a Social Platform For Ideas and Perceptions. </br>
			Post your ideas, explore all current trends and learn !! <br>
			Increase your merit points by all positive upfeeds from other users!! <br><br>
			Created in 2020. Version 1.0  <br><br>
			*********************************<br><br>
			Upcoming Features in Version 1.4
			<br>Post Removal
			<br>Image Posting with article
			<br>Un-Save Feature
			<br>Undo of Upfeed and Downfeed <br><br>
		</div>

				
	</div>
</div></div>

</body>
</html>