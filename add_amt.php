<?php
//////BONAFIDE 2//////
require_once 'dbconfig.php';
session_start();

$regNO=$_SESSION['uname'];
$purpose=$_POST['pup'];
$amount =$_POST['amt'];
$stable = $_SESSION['stable'];
$sql1="SELECT instituteId,campusId FROM $stable where RegNo='$regNO' ";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_row($res1);
$iID=$row1[0];
$cID=$row1[1];
$ctable="campus_".$iID;
$atable="accounts_".$iID.$cID;

//Purpose
$sql1="SELECT purposeId FROM purpose where purposeName='$purpose' ";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_row($res1);
$pID=$row1[0];

//certificateNo
$actable='accounts_'.$iID.$cID;
$sql1="SELECT * FROM $actable where regNo='$regNO' ";
$count=mysqli_num_rows(mysqli_query($conn,$sql1));
$cno=$regNO.'/'.$iID.$cID.'/'.$pID.'/'.++$count;

//insert log in accounts table
$sql1="INSERT INTO $actable(`instituteId`, `campusId`, `FLAG`, `regNo`, `purpose`, `certificateNo`, `amount`,`type`) VALUES ('$iID','$cID','0','$regNO','$purpose','$cno','$amount','b2')";
$res1=mysqli_query($conn,$sql1);

?>