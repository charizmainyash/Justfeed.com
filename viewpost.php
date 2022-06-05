<?php
session_start();
require ("checkses.php");
$artid = $_GET["artid"];
?>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> JF | Post </title>
<link rel="stylesheet" href="post.css"></link>
<link rel="stylesheet" href="login.css"></link>
<script type="text/javascript" src="view.js"> </script>
<style>
#art
{
	height:60%;
	width:80%;
}
#lik
{
	color:white;
}
#likno
{
	color:white;
	margin-right:10%;
}
#title
{
	border: none;
	background: rgba(0,0,0,0);
	color:white;
}
#up
{
	width:5%;
	height:5%;
}
#down
{
	width:5%;
	height:5%;
}
.react{
	height : 5%;
	width : 25%;
	text-align : center;
	background-color: rgba(0,0,0,0);
	border : 2px solid white;
	color: white;
}

@media only screen and (max-width:750px)
{
		.react{
				width : 50%;
		}
}

</style>
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


	<?php 
		$ar=mysqli_query ($connect,"select * from article where articleid='$artid'");
		$arrow=mysqli_fetch_array($ar);
	?>
	<form id="wp" >
	<br><br>
		<input type="text" id="title" name="title" value="<?php echo $arrow[1];  ?>"  readonly><br><br>
		<textarea id="art" name="art" rows="50" cols="50"  readonly  ><?php echo $arrow[2]; ?></textarea><br><br>
	</form>
	<input type="button" class="react" id="upfeed" value="UpFeed" onclick="updatefeedup('green','red','rgba(0,0,0,0)');" />
	<input type="button" class="react" id="downfeed" value="DownFeed" onclick="updatefeeddown('green','red','rgba(0,0,0,0)');" />
	<input type="button" class="react" id="sav" value="Save Article"  onclick="updatesav('green','black');" />
	<input type="text" value="<?php echo $artid; ?>" id="artid" style="display:none;">

	<?php 
		$totalupdown = mysqli_fetch_array(mysqli_query($connect,"select upfeed,downfeed from article where articleid=".$artid));
		$dat = mysqli_query($connect,"select upfeed,downfeed,saved from users where userid=".$_SESSION['id']);
		$data = mysqli_fetch_array($dat);
	
		$reg = "/[\s]".$artid."[\s]/";
		//regX for front only
		$regf = "/[\s]".$artid."/";
		
		if(preg_match($regf,$data[2]))
		{
			?>
				<script> sav.style.background = 'green';
							sav.value='Saved'; </script>
			<?php
		}
		
		
		if(preg_match($reg, $data[0]))
		{
			?>
				<script> upfeed.style.background = 'green'; </script>
			<?php
		}
		else if (preg_match($reg,$data[1]))
		{
			?>
				<script> downfeed.style.background = 'red'; </script>
			<?php
		}
		
	?>

	</div>
</div>
</body>
</html>

<script type="text/javascript">
	upfeed.value = "UpFeed  "+<?php echo $totalupdown[0]; ?>;
	downfeed.value = "DownFeed  "+<?php echo $totalupdown[1]; ?>;
</script>

