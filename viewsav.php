<?php
session_start();
include ("checkses.php");
?>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> JF | Saved </title>
<link rel="stylesheet" href="login.css"></link>
<link rel="stylesheet" href="profile.css"></link>
<script type="text/javascript" src="reg.js"> </script>
</head>

<body>
<?php
//echo$_SESSION['mail'];
$connect=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($connect,"JustFeed");

$dat=mysqli_query($connect,"select * from users where userid = '".$_SESSION['id']."' ");
$data=mysqli_fetch_array($dat);
$p = mysqli_query($connect,"select prof from proloca order by prof");
$l = mysqli_query($connect,"select loca from proloca order by loca");
//echo$data[0];
?>

<?php include ("nav.html"); ?>


<div id="mainfeed">
	<div class = "circle">
	<form action="viewP.php" method="post" enctype="multipart/form-data" onsubmit="return validatePhoto();" style="display:none;">
		<input type="file" id="pic" name="pic" style="display:none;" onchange="dp_update.click();">
		<input type="text" id="uid" name="uid" value="<?php echo$data[7] ?>" style="display:none;">
		<input type="submit" id="dp_update" style="display:none;">
	</form>
		<img src = "Photo\<?php echo$data[6]; ?>" id = "profile_pic" onclick = "pic.click();" />
	</div>
	
	<div class = "circle">
		<img src="Background/merit.jpeg" class = "back" />
		<p class="circle_text"> <?php echo$data[8]; ?><br><font size="3%">MERITS</font> </p>
	</div>

	<div class = "circle">
		<img src="Background/article.jpeg" class = "back" /> 
		<p class="circle_text"> <?php echo$data[9]; ?><br><font size="3%">ARTICLES</font> </p>
	</div>
	<style>
	#sss
	{
	
		color:white;
	}
	#ss
	{
	
		background-color:green;
	}
	</style>
	<?php $totsav=mysqli_fetch_array(mysqli_query($connect,"select saved from users where userid = '".$_SESSION['id']."' "));
	?>
	<div class = "circle">
		 <a href="viewsav.php" id="sss"> <img src="Background/saved.jpeg" class = "back" id="ss"/> 
		 <p class="circle_text"> <?php echo count(explode(" ",$totsav[0]))-1; ?><br><font size="3%">SAVED </a></font></p> 
	</div>
	
	<!-- Profile Details -->
	<input type='text' value='Name' class='namefield' readonly>
	<input type='text' value='<?php echo$data[0] ?>' class='datafield' id='fname' required>
	<input type='text' value='E-Mail ID' class='namefield' readonly>
	<input type='text' value='<?php echo$data[1] ?>' class='datafield' id='mail' readonly>
	<input type='text' value='Date of Birth' class='namefield' readonly>
	<input type='date' value='<?php echo$data[3] ?>' class='datafield' id='dob' required>
	<input type='text' value='Profession' class='namefield' readonly>
	<select class='datafield' id='prof' required> 	
					<option value='<?php echo$data[4] ?>' > <?php echo$data[4] ?></option>
					<?php while($pl=mysqli_fetch_array($p)){?>
						<option value="<?php echo$pl[0] ?>" > 
						<?php 	echo$pl[0]; }?> </option>	</select>							
	<input type='text' value='Location' class='namefield' readonly>
	<select class='datafield' id='loc' required>
					<option value='<?php echo$data[5] ?>' > <?php echo$data[5] ?> </option>
					<?php while($ll=mysqli_fetch_array($l)){?>
						<option value="<?php echo$ll[0] ?>" > 
						<?php 	echo$ll[0]; }?> </option>	</select>
	<input type='button' value='Update Details' class='namefield' onclick="updateDetails();">
	<input type='button' value='Update Password' class='datafield' onclick="alert('Work under Progress')">


	<div id="postfeed" >
	<?php
		mysqli_select_db($connect,"justfeed");
		$ids=mysqli_fetch_array(mysqli_query($connect,"select saved from users where userid='".$_SESSION['id']."' "));
		//echo$ids[0];
			//$imp = $imp + $ids[0]; 
			//$imp ="This is a string";
		$chat = explode(" ",$ids[0]);
		//echo$chat[0];
		//$chu = array_chunk($ids,1);
		//foreach($chu as $chat)
		//echo$chat;
		foreach($chat as $mat)
		{
		$q = mysqli_query($connect,"select * from article where articleid='$mat' order by uploadtime desc ");
		while($articles = mysqli_fetch_array($q))
		{
			?>
				<div class = "feed" onclick="window.location = 'viewpost.php?artid=<?php echo $articles[0]; ?>' ">
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
		
	?>
	</div>
	
</div>




</body>
</html>


<?php
	if(isset($_REQUEST['uid']))
	{
		$uid = $_REQUEST['uid'];
		$target_file = "Photo/".$data[6];
		if(move_uploaded_file($_FILES['pic']['tmp_name'],$target_file))
		{	
			?><script> alert("Updated") </script><?php
		}
		else
		{	
			?><script> alert("Not Updated"); </script><?php
		}
	}
?>

