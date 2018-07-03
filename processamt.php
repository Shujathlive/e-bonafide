<?php
require_once 'dbconfig.php';
session_start();

$regNO=$_SESSION['uname'];
$purpose=$_POST['pup'];
//$purpose='Visa';
$stable = $_SESSION['stable'];

//Institute
$sql1="SELECT instituteId,campusId FROM $stable where RegNo='$regNO' ";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_row($res1);
$iID=$row1[0];
$cID=$row1[1];
$ctable="campus_".$iID;

//Purpose
$sql1="SELECT purposeId FROM purpose where purposeName='$purpose' ";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_row($res1);
$pID=$row1[0];

//certificateNo
$actable='accounts_'.$iID.$cID;
$sql1="SELECT * FROM $actable where regNo='$regNO' ";
$count=mysqli_num_rows(mysqli_query($conn,$sql1));
$cno=$regNO.'/'.$pID.'/'.++$count;

//accounts insert
$sql="INSERT INTO $actable(instituteId,campusId,FLAG,regNo,purpose,certificateNo)
VALUES ('$iID','$cID','0','$regNO','$purpose','$cno')";
$res=mysqli_query($conn,$sql);

$hdsql="SELECT `area`, `pincode`, `district`, `state`, `country`, `phone1`, `phone2`, `fax`, `emailId`, `website`, `serviceinfo`, `designation`, `desgName`, `campLogo` FROM `$ctable` WHERE campusId='$cID'";

$hdres=mysqli_query($conn,$hdsql);
$hdrow=mysqli_fetch_row($hdres);

$campLogo=$hdrow[13];
$campLogo=base64_encode("$campLogo");

$sql="SELECT  `StudentName`, `DOB`, `RegNo`, `Sex`, `Branch`, `YearofStudying`, `Academic Year`, `Program`, `DurationOfCourse` FROM `$stable` WHERE RegNo='$regNO'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);

//create an array of form elements
$myArr = array($hdrow[0],$hdrow[1],$hdrow[2],$hdrow[3],$hdrow[4],$hdrow[5],$hdrow[6],$hdrow[7],$hdrow[8],$hdrow[9],$hdrow[10],$hdrow[11],$hdrow[12],$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$cno,$purpose);

echo json_encode($myArr);
ob_flush();
?>