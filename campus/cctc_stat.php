<?php
session_start();
require_once 'dbconfig.php';
$cctable=$_SESSION["cctable"];
$cno=$_POST['cno'];
$cert=$_POST['cert'];
$stat=$_POST['stat'];
$sql = sprintf("UPDATE $cctable
SET activate = '$stat'
WHERE certificateNo = '$cno'");

$res = mysqli_query($conn,$sql);

?>