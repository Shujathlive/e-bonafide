<?php
require_once 'dbconfig.php';
session_start();

$regNO=$_SESSION['uname'];
$stable = $_SESSION['stable'];

$cno=$_POST['cno'];
$purpose=$_POST['pup'];

$sql1="SELECT instituteId,campusId FROM $stable where RegNo='$regNO' ";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_row($res1);
$iID=$row1[0];
$cID=$row1[1];
$ctable="campus_".$iID;
$atable="accounts_".$iID.$cID;

$hdsql="SELECT `instituteName`,`area`, `pincode`, `district`, `state`, `country`, `phone1`, `phone2`, `fax`, `emailId`, `website`, `serviceinfo`, `designation`, `desgName`,`campLogo`, `digisign`,`schoolName` FROM `$ctable` WHERE campusId='$cID'";

$hdres=mysqli_query($conn,$hdsql);
$hdrow=mysqli_fetch_row($hdres);


$campLogo=$hdrow[14];
$campLogo=base64_encode("$campLogo");

$digiSign=$hdrow[15];
$digiSign=base64_encode("$digiSign");

//Amount
$sql1="SELECT amount FROM $atable where certificateNo='$cno' ";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_row($res1);
$amount=$row1[0];

$sql="SELECT  `StudentName`, `DOB`, `RegNo`, `Sex`, `Branch`, `YearofStudying`, `Academic Year`, `Program`, `DurationOfCourse` FROM `$stable` WHERE RegNo='$regNO'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);

//create an array of form elements
$TuiTotal  = 0.5*$amount; //400000.00
$LabTotal  = 0.2*$amount; //160000.00
$CLabTotal = 0.1*$amount; //80000.00
$LibTotal  = 0.05*$amount; //40000.00
$SnGTotal  = 0.05*$amount; //40000.00
$DevTotal  = 0.1*$amount; //80000.00

$TuiFee  = $TuiTotal/4;
$LabFee  = $LabTotal/4;
$CLabFee = $CLabTotal/4;
$LibFee  = $LibTotal/4;
$SnGFee  = $SnGTotal/4;
$DevFee  = $DevTotal/4;

$YearCourseFee = $TuiFee + $LabFee + $CLabFee + $LibFee + $SnGFee + $DevFee; //200000.00


settype($TuiTotal, "string");  
settype($LabTotal, "string");  
settype($CLabTotal, "string");  
settype($LibTotal, "string");  
settype($SnGTotal, "string");  
settype($DevTotal, "string");  
settype($TuiFee, "string");  
settype($LabFee, "string");  
settype($CLabFee, "string");  
settype($LibFee, "string");  
settype($SnGFee, "string");  
settype($DevFee, "string");  
settype($YearCourseFee, "string");  



$myArr = array($hdrow[0],$hdrow[1],$hdrow[2],$hdrow[3],$hdrow[4],$hdrow[5],$hdrow[6],$hdrow[7],$hdrow[8],$hdrow[9],$hdrow[10],$hdrow[11],$hdrow[12],$hdrow[13],$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$TuiFee,$TuiFee,$TuiFee,$TuiFee,$TuiTotal,$LabFee,$LabFee,$LabFee,$LabFee,$LabTotal,$CLabFee,$CLabFee,$CLabFee,$CLabFee,$CLabTotal,$LibFee,$LibFee,$LibFee,$LibFee,$LibTotal,$SnGFee,$SnGFee,$SnGFee,$SnGFee,$SnGTotal,$DevFee,$DevFee,$DevFee,$DevFee,$DevTotal,$YearCourseFee,$YearCourseFee,$YearCourseFee,$YearCourseFee,$amount,$amount,$purpose, $campLogo,$digiSign,$hdrow[16],$cno);

echo json_encode($myArr);
ob_flush();
?>