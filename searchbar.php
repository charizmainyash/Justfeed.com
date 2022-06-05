<?php
session_start();
require ("checkses.php");
?>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> JF | Search </title>
<link rel="stylesheet" href="login.css"></link>
<link rel="stylesheet" href="search.css"></link>
<style>
#t
{
	font-family:Verdana;
	color:crimson;
}
#ser
{
	width:40%;
	height:10%;
	border:5px solid white;
	border-radius:50px;
	font-size:28px;
	color:red;
}
#subser
{
	width: 20%;
	height:10%;
	border:5px solid white;
	border-radius:50px;
}
#subser:hover
{
	color:white;
	background-color:orange;
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
//echo$data[0];
?>

<?php include "nav.html"; ?>
	
	
<div id="mainfeed">
	
	<!--<form id="fser" name="fser" action="searchbar.php" method="get">
	<input type="text" id="ser" name="ser" placeholder="Search Tag" required value="<?php //echo $_REQUEST["ser"]; ?>" >
	<input type="submit" id="subser" value="Search" name="subser" >
	</form>-->
	<div class="panels" id="upperpanel">
		<form action="searchbar.php">
		T O P &nbsp;  T R E N D I N G
		<input type="text" id="searchbar" name="res" placeholder="#hashtag" onchange="searchtag.click();">
		<input type="submit" id="searchtag" style="display:none;">
		<img src="Background/searchicon.jpg" id="searchicon" />
		</form>
	</div>
	<center>
	<?php
		mysqli_select_db($connect,"justfeed");
		if(isset($_REQUEST["res"]))
		{
		$res = $_REQUEST["res"];
		$ress="%".$res."%";
		$q = mysqli_query($connect,"select * from article where tags like '$ress' order by uploadtime desc"); 
		if($q)
		{
	
		?> <h1 id="t"> Results For : <?php echo$res; ?> </h1> </center>
		<?php
			while($articles = mysqli_fetch_array($q))
			{
				?>
				<div class = "feed" onclick="window.location = 'viewpost.php?artid=<?php echo $articles[0]; ?>' "">
				<b id="aid">	<?php echo $articles[0]; ?><br></b>
				<b id="tt">		<?php echo $articles[1]; ?><br></b><br><br>
				<b id="taag">	Tagged As:&nbsp;<?php echo $articles[6]; ?><br></b>
				<b id="naa">	By:&nbsp;<?php $naam=mysqli_query($connect,"select name from users where userid='$articles[3]'");
										$naamarr=mysqli_fetch_array($naam); 
										echo$naamarr[0];?> </b><br>
					<p style = "display:none;">
						<?php echo $articles[2]; ?><br>
						<?php echo $articles[4]; ?><br>
						<?php echo $articles[5]; ?>
					</p>
				</div>
				<?php
			}
		}
		if(!$q)
		{
			echo "Not found";
			?>	<div class = "feed" id="dis1" span style="display:block">
				<br><h1 id="noser"> No Result Found </h1> </div>
			<?php
		}
		}
		?>
		
</div>


</body>
</html>

