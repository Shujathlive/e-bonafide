<?php
require_once 'dbconfig.php';
session_start();

$pName=$_POST['p_name'];
$sql="INSERT INTO purpose (purposeName)
VALUES ('$pName');";
$res=mysqli_query($conn,$sql);

if($res){
	echo "<script type='text/javascript'>location.href='add_purpose.php';</script>";
}
else{
	echo "<script type='text/javascript'>alert('failure');	location.href='add_purpose.php';</script>";
}
?>