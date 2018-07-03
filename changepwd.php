
<?php
require_once 'dbconfig.php';
session_start();
if($_POST['submit']){
$username=$_SESSION['uname'];
$oldpwd=$_POST['oldpwd'];
$newpwd = $_POST['newpwd'];
$rpwd = $_POST['rpwd'];

$uname=$_SESSION['uname'];
$sql=sprintf("SELECT DOB FROM main WHERE RegNo='$uname' ");
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);
$currpwd=$row[0];
if($oldpwd == $currpwd){
	$sql1=sprintf("UPDATE `main` SET `DOB`='$newpwd' WHERE  `RegNo`='$uname' ");
	$res1=mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_row($res1);
	if($row1[0]==$rpwd){
		echo "<script>Materialize.toast('Request sent!', 4000);</script>";
	}
	else{
		echo "<script>alert('Passwords Do NOT Match!');location.href='changepassword.php';</script>";
	}
}
else{
	echo "<script>alert('Incorrect Password, Retype!');location.href='changepassword.php';</script>";
}
}
?>

