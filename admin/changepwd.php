
<?php
require_once 'dbconfig.php';
session_start();
$username='admin';//$_SESSION['uname'];
$oldpwd=$_POST['oldpwd'];
$newpwd =$_POST['newpwd'];

$rpwd = $_POST['rpwd'];


$uname='admin';//$_SESSION['uname'];
$sql=sprintf("SELECT DOB FROM main WHERE RegNo='$uname' ");
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);
$currpwd=$row[0];

if($oldpwd == $currpwd){
	if($newpwd == $rpwd){
		$pwd = md5($rpwd);
		$sql1=sprintf("UPDATE `main` SET `DOB`='$pwd' WHERE  `RegNo`='$uname' ");
		$res1=mysqli_query($conn,$sql1);
		if($res1){
			echo "<script>alert('Password Set!');location.href='changepassword.php';</script>";
		}
		else{
			echo "<script>alert('Passwords NOT Set!');location.href='changepassword.php';</script>";
		}
	}
	else{
		echo "<script>alert('Passwords Do NOT Match!');location.href='changepassword.php';</script>";
	}
}
else{
	echo "<script>alert('Incorrect Password, Retype!');location.href='changepassword.php';</script>";
}

?>

