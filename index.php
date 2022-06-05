<?php 
session_start();
if(isset($_SESSION['id']))
	header("Location: login.php");
?>
<html>

<head>
<title> JustFeed </title>
<link rel="stylesheet" href="index.css" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div id="eff1"> </div>
<div id="bababack" >

<h1 id="titlemain"> Welcome To JustFeed <br>
 ------------------------------</h1>
 <h1 id="titlesmall"> A Platform to learn and share Ideas. </h1>
</div>

 
<div id="content">

<h1> Login To Continue </h1>

<form id="log" action="check.php" method="post">
<p>Enter Your Email <br>
<input type="email" id="email" name="email">
<br>
<p> Enter Your Password <br>
<input type="password" id="pass" name="pass">
<br></p>
<input type="submit" value="Log in" id="sub" name="sub">
<br>
</form>

<a href="forget.php" id="forget">Forget Your Password? </a>
<br><br>
<a href="reg.php" id="reg"> Don't have an Account? Join Us! </a>

</div>














