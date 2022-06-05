<html>
<head>
<title> Confirming Login </title>
</head>

<body>
<?php
if(isset($_REQUEST["sub"]))
{
$connect=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($connect,"JustFeed");
$count=0;

$email=$_REQUEST["email"];
$pass=$_REQUEST["pass"];
$id;

$data=mysqli_query($connect,"select email,pass from users");
while($row=mysqli_fetch_array($data))
{
	if (( $email == $row[0]) && ($pass == $row[1]))
	{
	
		$count=1;
	}
	
}
if($count==1)
{
	session_start();
	//$_SESSION['mail']=$email;
	$iddata=mysqli_query($connect,"select userid from users where email = '".$email."' ");
	$idrow=mysqli_fetch_array($iddata);
	$id=$idrow[0];
	$_SESSION['id']=$id;
	//echo$_SESSION['id'];
	header("Location: login.php");
}
else
{
	header("Location: login-fail.php");
}
} 

?>

</body>

</html>

