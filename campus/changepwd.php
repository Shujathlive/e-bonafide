
<?php
require_once 'dbconfig.php';
session_start();
$username='admin';//$_SESSION['uname'];
$oldpwd=$_POST['oldpwd'];
$newpwd = sha1($_POST['newpwd']);

$rpwd = sha1($_POST['rpwd']);



$uname='admin';//$_SESSION['uname'];
$sql=sprintf("SELECT campusPassword FROM campus WHERE campusUsername='$uname' ");
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);
$currpwd=$row[0];

if($oldpwd == $currpwd){
	$sql1=sprintf("UPDATE `campus` SET `campusPassword`='$newpwd' WHERE  `campusUsername`='$uname' ");
	$res1=mysqli_query($conn,$sql1);
	
	if($res1){
		if($newpwd == $rpwd){
			echo "<script>alert('Password Set!');location.href='changepassword.php';</script>";
		}
		else{
			echo "<script>alert('Passwords Do NOT Match!');location.href='changepassword.php';</script>";
		}
	}
	else{
		echo "<script>alert('Passwords NOT Set!');location.href='changepassword.php';</script>";
	}
}
else{
	echo "<script>alert('Incorrect Password, Retype!');location.href='changepassword.php';</script>";
}

?>

