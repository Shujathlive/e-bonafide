<?php
require_once 'dbconfig.php';
session_start();

$regNO=$_SESSION['uname'];
//$purpose='$_POST';
$stable = $_SESSION['stable'];

//Institute
$sql1="SELECT instituteId,campusId FROM $stable where RegNo='$regNO' ";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_row($res1);
$iID=$row1[0];
$cID=$row1[1];
$ctable="campus_".$iID;

/*Purpose
$sql1="SELECT purposeId FROM purpose where purposeName='$purpose' ";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_row($res1);
$pID=$row1[0];
*/
/*certificateNo
$actable='accounts_'.$iID.$cID;
$sql1="SELECT * FROM $actable where regNo='$regNO' ";
$count=mysqli_num_rows(mysqli_query($conn,$sql1));
$cno=$regNO.'/'.$iID.$cID.'/'.$pID.'/'.++$count;
*/
/*accounts insert
$sql="INSERT INTO $actable(instituteId,campusId,FLAG,regNo,purpose,certificateNo,type)
VALUES ('$iID','$cID','0','$regNO','$purpose','$cno','b1')";
$res=mysqli_query($conn,$sql);
*/

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

echo json_encode($myArr);
ob_flush();
?>