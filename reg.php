<html>

<head>
<title> JF | Registration </title>
<link rel="stylesheet" href="reg.css">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<script type="text/javascript" src="reg.js"> </script>
</head>

<body>
<?php 
$connect=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($connect,"justfeed");
$p = mysqli_query($connect,"select prof from proloca order by prof");
$l = mysqli_query($connect,"select loca from proloca order by loca");
?>

<div id="content">
<a href="index.php" onclick = "return confirm('Are you sure? You are about to leave registration!');"><-Go Back </a>

<form id="regform" action="regdone.php" onsubmit="return validateAll();" method="post" enctype="multipart/form-data">
<center>
<table>
<tr><td>    Enter Name  : </td><td id="i"><input type="text" id="fname" name="name"  required></td></tr><br>
<tr><td>Enter Email : </td><td id="i"><input type="email" id="uemail" name="email"  onchange="validateEmail();" required></td></tr>
<tr><td> Create Password : </td ><td id="i"><input type="password" id="pass" name="pass" onchange="validatePassword();" required></td></tr>
<tr><td>Confirm Password : </td><td id="i"><input type="password" id="confirmpass" name="confirm" onchange="validateConfirm();" required></td></tr>
<tr><td>Enter Date of Birth :</td><td id="i"> <input type="date" id="dob" name="dob" required></td></tr>
<tr><td>Select profession : </td><td id="i"><select id="prof" name="prof">
							<?php while($pl=mysqli_fetch_array($p)){?>
							<option value="<?php echo$pl[0] ?>" > 
							<?php 	echo$pl[0]; }?> </option>
				</select> </td></tr>
<tr><td>Select Location :</td><td id="i"> <select id="loca" name="loca">
							<?php while($ll=mysqli_fetch_array($l)){?>
							<option value="<?php echo$ll[0] ?>" > 
							<?php 	echo$ll[0]; }?> </option>>
				</select></td></tr> 
 <tr><td>Enter Photo :</td><td> <input type="file" id="pic" name="pic" onchange = "validatePhoto();" required></td></tr></table>
<input type="submit" id="sub" value="Register" name="sub"></input>
</form>
</center>

</div>
</body>
</html>

