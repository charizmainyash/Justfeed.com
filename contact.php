<?php
session_start();
require ("checkses.php");
?>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> JF | ContactUs </title>
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="contact.css">

<script>
	function display(check)
	{
		if(check == 1)
		{
			btn1.className = 'btn3';
			btn2.className = 'btn';
			contact.style.display = 'block';
			write.style.display = 'none';
		}
		else if (check == 2)
		{
			btn2.className = 'btn3';
			btn1.className = 'btn';
			contact.style.display = 'none';
			write.style.display = 'block';
		}
	}

	function sendData()
	{
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(this.readyState==4 && this.status==200)
			{
				//alert(this.responseText);
				if(this.responseText)
				{
					alert("ThankYou for your time.");
					content.value ="";
				}
				else
					alert("Unable to process request.");
			}
		}
		var url = "regE.php?feed="+content.value+"&uid="+uid.value+"&mail="+mail.value+"";
		xmlhttp.open("GET",url,true);
		xmlhttp.send();
	}
</script>

</head>

<body onload = "display(1);">
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
		<input type="button" value="Contact Us" class="btn" id="btn1" onclick="display(1);" />
		<input type="button" value="Write Us" class="btn" id="btn2" onclick="display(2);" />
		<div class="detail" id="contact">
			<br><br>
				Developers Contacts:<br>
				Email 		: amankr429@gmail.com<br>
				Instagram 	: https://www.instagram.com/aman_._meme/ <br>
				Address 	: P/O Chutia Ranchi Jharkhand India<br>
				
				
			
		</div>

		<div class="detail" id="write" style="display : none;">
			<input type="text" value="USER ID: <?php echo $data[7]; ?>" class="inputfield" readonly />
			<input type="text" value="EMAIL ID: <?php echo $data[1]; ?>" class="inputfield" readonly />
			<input type="text" value="<?php echo $data[7]; ?>" id="uid" style="display:none" />
			<input type="text" value="<?php echo $data[1]; ?>" id="mail" style="display:none" />
			<textarea id="content"></textarea>
			<input type="button" value="Send Us" class="inputfield" id="sendbtn" onclick="sendData();">
		</div>		
	</div>
</div></div>

</body>
</html>