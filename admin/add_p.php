<?php
require_once 'dbconfig.php';
session_start();

$pName=$_POST['p_name'];
$sql="INSERT INTO purpose (purposeName)
VALUES ('$pName');";
$res=mysqli_query($conn,$sql);

if($res){
	echo 'success PURPOSE';
}
else{
	echo 'fail PURPOSE';
}
?>