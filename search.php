<?php
session_start();
require ("checkses.php");
?>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> JF | Trending </title>
<link rel="stylesheet" href="login.css"></link>
<link rel="stylesheet" href="search.css"></link>
<style>
@media only screen and (max-width:750px)
{
	#tit
	{
		font-size:18px;
		width:100%;
	}
]
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
		<b id="tit">T O P &nbsp;  T R E N D I N G </b>
		<input type="text" id="searchbar" name="res" placeholder="#hashtag" onchange="searchtag.click();">
		<input type="submit" id="searchtag" style="display:none;">
		<img src="Background/searchicon.jpg" id="searchicon" />
		</form>
	</div>	
	<div id="trendingpanel">
		<?php
		mysqli_select_db($connect,"justfeed");
		$tr1 = mysqli_query($connect,"select max(number) from tags");
		$tr1row = mysqli_fetch_array($tr1);
		$tr2 = mysqli_query($connect,"select max(number) from tags where number<'$tr1row[0]' ");
		$tr2row = mysqli_fetch_array($tr2);
		$tr3 = mysqli_query($connect,"select max(number) from tags where number<'$tr2row[0]' ");
		$tr3row=mysqli_fetch_array($tr3);
		
		
		$trname = mysqli_query($connect,"select tag from tags where number = '$tr1row[0]' or number='$tr2row[0]' or number='$tr3row[0]' limit 3 ");
		
		while(	$trnamerow = mysqli_fetch_array($trname))
		{
		
		?> 	<button class="trendbutton" id="t" onclick="searchbar.value='<?php echo $trnamerow[0]; ?>';searchtag.click(); ">
						<?php echo $trnamerow[0];
																							}?> 
		 </button>
	</div>
	<div id="feedpanel">
		<?php
		$tg = mysqli_query($connect,"select tag from tags where number = '$tr1row[0]' ");
		$tgrow = mysqli_fetch_array($tg);
		$tagname="%".$tgrow[0]."%";

		$tg2 = mysqli_query($connect,"select tag from tags where number = '$tr2row[0]' ");
		$tgrow2 = mysqli_fetch_array($tg2);
		$tagname2="%".$tgrow2[0]."%"; 
		
		$tg3 = mysqli_query($connect,"select tag from tags where number = '$tr3row[0]' ");
		$tgrow3 = mysqli_fetch_array($tg3);
		$tagname3="%".$tgrow3[0]."%";
		
		
		
		$q = mysqli_query($connect,"select * from article  where tags like '$tagname' or tags like '$tagname2' or tags like '$tagname3' order by uploadtime desc");
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

		?>
	</div>
</div>

</body>
</html>

