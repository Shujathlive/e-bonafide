<?php
require_once 'dbconfig.php';
session_start();

$campname=$_SESSION['uname'];
$regNO=$_POST['regno'];
$cert=$_POST['cert'];

//Campus and student
$sql1="SELECT instituteId,campusId FROM campus where campusName='$campname' ";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_row($res1);
$iID=$row1[0];
$cID=$row1[1];
$ctable="campus_".$iID;
$stable="student_".$iID.$cID;

$hdsql="SELECT `instituteName`,`area`, `pincode`, `district`, `state`, `country`, `phone1`, `phone2`, `fax`, `emailId`, `website`, `serviceinfo`, `designation`, `desgName`, `campLogo`, `digisign`,`schoolName` FROM `$ctable` WHERE campusId='$cID'";

$hdres=mysqli_query($conn,$hdsql);
$hdrow=mysqli_fetch_row($hdres);

$campLogo=$hdrow[14];
$campLogo=base64_encode("$campLogo");

$digiSign=$hdrow[15];
$digiSign=base64_encode("$digiSign");

$sql="SELECT  `StudentName`,`RegNo`, `Sex`, `Branch`, `YearofStudying`, `Academic Year`, `Program`, `DurationOfCourse` FROM `$stable` WHERE RegNo='$regNO'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);

//create an array of form elements
$myArr = array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$campLogo,$digiSign);

$data['arr']=$myArr;
$data['cert']=$cert;

echo json_encode($data);
ob_flush();
?>