<?php
require_once 'dbconfig.php';
session_start();

$username=$_SESSION['uname'];
$cert=$_POST['cert'];
$stable = $_SESSION['stable'];

$sql1="SELECT instituteId,campusId FROM $stable where RegNo='$username' ";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_row($res1);
$iID=$row1[0];
$cID=$row1[1];
$ctable="campus_".$iID.$cID;
//certificateNo
$sql1="SELECT * FROM $ctable where regNo='$username' ";
$count=mysqli_num_rows(mysqli_query($conn,$sql1));
$cno=$username.'/'.$iID.$cID.'/'.$cert.'/'.++$count;

$sql1="INSERT INTO $ctable(`instituteId`, `campusId`, `certificate`, `regNo`, `certificateNo`) VALUES ('$iID','$cID','$cert','$username','$cno')";
$res1=mysqli_query($conn,$sql1);


?>