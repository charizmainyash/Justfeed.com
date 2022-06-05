<html>
<head>
<title> Registration </title>
<link rel="stylesheet" href="regdone.css"></link>
</head>
<body>
<?php
if(isset($_REQUEST["sub"]))
{
$connect=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($connect,"justfeed");

$id=mysqli_query($connect,"select max(userid) from users");
$len=0;
$row=mysqli_fetch_array($id);
//echo$row[0];	
$len=$row[0]+1;
	

$name=$_REQUEST["name"];
$email=$_REQUEST["email"];
$pass=$_REQUEST["pass"];
$dob=$_REQUEST["dob"];
$prof=$_REQUEST["prof"];
$loca=$_REQUEST["loca"];


$userid=$len;
$merit=0;
$article=0;
$upfeed=0;
$downfeed=0;
$saved=0;


$target="Photo\Pic".$userid.".jpeg";

$_FILES['pic']['name'];
/*foreach($_FILES['pic'] as $key => $value)
	echo("<br>".$key."&nbsp".$value); */
	
move_uploaded_file($_FILES['pic']['tmp_name'],$target);

$picname="Pic".$userid.".jpeg";


// $file=addslashes(file_get_contents());



if(mysqli_query($connect,"insert into users values('$name','$email','$pass','$dob','$prof','$loca','$picname','$userid',
										'$merit','$article','$upfeed','$downfeed','$saved')"))
										{?>
											<div id="content">
											<p> Registration Succesful <br><br> Login To Visit JustFeeds </p>
											<a href="index.php">Back To Login </a>
											</div>
										<?php
										}
else
{?>
		<div id="content">
		<p> Registration Unsuccesful <br><br> Email ID Already exists. </p>
		<a href="index.php">Back To Login </a></br><br>
		<a href="reg.php">Try Again</a>
		</div>
	<?php
}
}
?>

</body>