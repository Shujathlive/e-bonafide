<?php
session_start();
require_once 'dbconfig.php';
$acctable=$_SESSION["acctable"];
$cno=$_POST['cno'];
$amt=$_POST['amt'];
$sql = sprintf("UPDATE $acctable
SET FLAG = '1', amount = '$amt'
WHERE certificateNo = '$cno'");

$res = mysqli_query($conn,$sql);


?>