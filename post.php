<?php
session_start();
require ("checkses.php");

?>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> JF | Write </title>
<link rel="stylesheet" href="post.css"></link>
<link rel="stylesheet" href="login.css"></link>

</head>

<body>
<?php
//echo$_SESSION['id'];
$connect=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($connect,"justfeed");
$dat=mysqli_query($connect,"select * from users where userid = '".$_SESSION['id']."'");
$data=mysqli_fetch_array($dat);
//echo$data[0];
?>

<?php include ("nav.html"); ?>
<div id="mainfeed">
<div id="writepost" >
<center>
<P id="tit"> WRITE POST </p>
<form id="wp" action="post-done.php" method="post">
<input type="text" id="title" name="title" placeholder="ENTER TITLE" required><br><br>

	<!--<b style="font-size:24px;"> Enter Tags </b>-->
<input type="text"  name="tag" id="taginpu" placeholder="Enter #hashtags"   required /></br><br>

<textarea id="art" name="art" rows="50" cols="50" required   ></textarea><br><br>
<input type="submit" id="subp" name="subp" >
</form>
</center>
</div>
</div>
</body>
</html>

<script>
			navbar.onclick = function(){
					return confirm("Are You Sure? Post Will be Discarded.");
		}
			sidebar.onclick = function(){
					return confirm("Are You Sure? Post Will be Discarded.");
		}
</script>
