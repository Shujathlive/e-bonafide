<?php
require_once 'dbconfig.php';
session_start();

//instituteId
$uname=$_SESSION['uname'];
$sql=sprintf("SELECT instituteId FROM institute WHERE instituteUsername='$uname' ");
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);
$insId=$row[0];
//auto-gen pwd
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}

$password = random_password(8);
$campName=$_POST['camp_name'];
$username = str_replace(' ', '', $campName);

$sql="INSERT INTO campus (campusName,campusUsername,campusPassword,instituteId)
VALUES ('$campName','$username','$password','$insId')";
$res=mysqli_query($conn,$sql);


////////////////////////////////////////////////////////////////////////////////////
//Find the campus ID
$sql="SELECT campusID from campus where campusUsername='$username'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);
$campId=$row[0];



//Campus Table Name
$campTable='campus_'.$insId.$campId;

//Insert InstitueId ,CampusName and CampusId
$sql1="INSERT INTO $campTable (campusName,campusId,instituteId)
VALUES ('$campName','$campId','$insId')";
$res1=mysqli_query($conn,$sql1);


////////////////////////////////////////////////////////////////////////////////////
//Student Table Name
$studTable='student_'.$insId.$campId;

//Create Student Table
$sql="CREATE TABLE $studTable (
   campusId int(5) ,
  instituteId int(5) NOT NULL,
  `SlNo` int(1) NOT NULL,
  `StudentId` int(3) DEFAULT NULL,
  `RegNo` varchar(15) NOT NULL,
  `StudentName` varchar(7) DEFAULT NULL,
  `Program` varchar(5) DEFAULT NULL,
  `DOB` varchar(10) DEFAULT NULL,
  `Sex` varchar(4) DEFAULT NULL,
  `Branch` varchar(50) NOT NULL,
  `YearofStudying` int(20) NOT NULL,
  `Academic Year` varchar(20) NOT NULL,
  `DurationOfCourse` int(20) NOT NULL,
  `FatherName` varchar(100) DEFAULT NULL,
  `MotherName` varchar(100) DEFAULT NULL,
  `GuardianName` varchar(100) DEFAULT NULL,
  `ContactNo` bigint(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `PermanentAddress` varchar(500) DEFAULT NULL,
  `CommunicationAddress` varchar(500) DEFAULT NULL,
  `Community` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `FatherAnnualIncome` varchar(10) DEFAULT NULL,
  `FatherOccupation` varchar(50) DEFAULT NULL,
  `PercentageofMarksobtainedinHsc` varchar(10) DEFAULT NULL,
  `Board/UniversityofExamination` varchar(100) DEFAULT NULL,
  `Nationality` varchar(50) DEFAULT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `Caste` varchar(30) DEFAULT NULL,
  `BloodGroup` varchar(10) DEFAULT NULL,
  `PhoneOff` varchar(30) DEFAULT NULL,
  `PhoneRes` varchar(30) DEFAULT NULL,
  `PCM` varchar(10) DEFAULT NULL,
  `PCB` varchar(10) DEFAULT NULL,
  `MotherTongue` varchar(10) DEFAULT NULL,
  `DocumentDate` varchar(50) DEFAULT NULL,
  `Weight-kg` varchar(10) DEFAULT NULL,
  `Height-cm` varchar(10) DEFAULT NULL,
  `Section` varchar(10) DEFAULT NULL,
  `AdmissionCategory` varchar(50) DEFAULT NULL,
  `EnrolledStatus` varchar(10) DEFAULT NULL,
  `Hostel/DayScholar` varchar(10) DEFAULT NULL,
  `Accounthead` varchar(50) DEFAULT NULL,
  `Ledger` varchar(50) DEFAULT NULL,
  `Semester` int(5) DEFAULT NULL,
  `Physicallychallenged` varchar(10) DEFAULT NULL,
  `ParentContactNumber` varchar(30) DEFAULT NULL,
  `ParentMailId` varchar(50) DEFAULT NULL,
  `EducationalQualification` varchar(50) DEFAULT NULL,
  `NameoftheUniversity` varchar(50) DEFAULT NULL,
  `YearofPassing` int(50) DEFAULT NULL,
  `NameoftheInstitution` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (RegNo)
)";
$res=mysqli_query($conn,$sql);

//Insert CampusId
$sql1="INSERT INTO $studTable (campusId,instituteId)
VALUES ('$campId','$insId')";
$res1=mysqli_query($conn,$sql1);

/////////////////////////////////////////////////////////////////////////////
//Student Table Name
$accTable='accounts_'.$insId.$campId;

//Create Student Table
$sql="CREATE TABLE $accTable (
    instituteId int(5) NOT NULL,
    campusId int(5) NOT NULL,
    FLAG int(1),
	regNo varchar(100) ,
	purpose varchar(50) ,
	certificateNo varchar(100) ,
	`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	type varchar(3) ,
	amount varchar(100) ,
   PRIMARY KEY (certificateNo)
)";
$res=mysqli_query($conn,$sql);

$password = random_password(8);
$campName=$_POST['camp_name'];
$username = 'acc_'.str_replace(' ', '', $campName);

//Insert CampusName and CampusId in accounts table
$sql1="INSERT INTO accounts (campusId,instituteId,accountsUsername,accountsPassword)
VALUES ('$campId','$insId','$username','$password')";
$res1=mysqli_query($conn,$sql1);
echo "<script type='text/javascript'>location.href='create_campus.php';</script>";
?>