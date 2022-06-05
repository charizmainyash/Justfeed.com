<?php
	// Page for partial loading
	session_start();
	require ("checkses.php");
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> JustFeed </title>
	<link rel="stylesheet" href="login.css"></link>
	<script>
		function preventBack() { window.history.forward(); }
        if(window.history.previous.href = "check.php")
        window.onunload = preventBack();
	</script>
</head>

<body onload="loader();">
	<?php
	$connect=mysqli_connect("127.0.0.1","root","");
	mysqli_select_db($connect,"JustFeed");

	$data=mysqli_fetch_array(mysqli_query($connect,"select * from users where userid = '".$_SESSION['id']."' "));
?>

<?php include "nav.html"; ?>

<div id="mainfeed">
	<div id='one'>
	<?php
		$query = "select * from article order by uploadtime desc LIMIT 3";
		$q = mysqli_query($connect,$query);
		while($articles = mysqli_fetch_array($q))
		{
			include("display_feeds.php");
		}
	?>
	</div>
	<div id="two">
	<div class="feed" onclick="loader();">
		<center>
			<img src="Background/loading.gif" id="gifloading">
		</center>
	</div>
	</div>
</div>	
</body>
 </html>


<script>
	var initial = 3;
	 function loader()
	{	
		if(initial>1)
		{	
			var url = "partial_ajax.php?last="+initial+"&id=1";
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200)
				{
					initial++;
					if(this.responseText == "We are done")
					{
						initial = 0;
						two.innerHTML = '';
					}
					else
						one.innerHTML += this.responseText;
					loader();
				}
			}
			xmlhttp.open("GET",url,true);
			xmlhttp.send();
		}
	}

	function show(id)
	{
		window.location ='viewpost.php?artid='+id;
	}
</script>

	
