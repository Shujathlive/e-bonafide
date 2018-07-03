<?php
session_start();

$status= '0';
$str='';
$message='';
include('dbconfig.php');
$db_selected = mysqli_select_db($conn,'ebonafide');

//validate whether uploaded file is a csv file
    $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');	
if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes))
{
  if(is_uploaded_file($_FILES['file']['tmp_name']))
   {
    //open uploaded csv file with read only mode
    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
    //skip first line
    fgetcsv($csvFile);        
    //parse data from csv file line by line
    while(($line = fgetcsv($csvFile)) !== FALSE)
	 {
	  	  if($line[0]!=NULL && $line[1]!=NULL && $line[2]!=NULL && $line[3]!=NULL  && $line[4]!=NULL  && $line[5]!=NULL  && $line[6]!=NULL  && $line[7]!=NULL  && $line[8]!=NULL  && $line[9]!=NULL  && $line[10]!=NULL  && $line[11]!=NULL  && $line[12]!=NULL  && $line[13]!=NULL  && $line[14]!=NULL  && $line[15]!=NULL  && $line[16]!=NULL  && $line[17]!=NULL  && $line[18]!=NULL  && $line[19]!=NULL  && $line[20]!=NULL  && $line[21]!=NULL  && $line[22]!=NULL  && $line[23]!=NULL  && $line[24]!=NULL  && $line[25]!=NULL  && $line[26]!=NULL  && $line[27]!=NULL  && $line[28]!=NULL  && $line[29]!=NULL  && $line[30]!=NULL  && $line[31]!=NULL  && $line[32]!=NULL  && $line[33]!=NULL  && $line[34]!=NULL  && $line[35]!=NULL  && $line[36]!=NULL  && $line[37]!=NULL  && $line[38]!=NULL  && $line[39]!=NULL  && $line[40]!=NULL  && $line[41]!=NULL  && $line[42]!=NULL  && $line[43]!=NULL  && $line[44]!=NULL  && $line[45]!=NULL  && $line[46]!=NULL  && $line[47]!=NULL  && $line[48]!=NULL  && $line[49]!=NULL )
	  {
      $query1 = sprintf("SELECT `SlNo`, `StudentId`, `RegNo`, `StudentName`, `Program`, `DOB`, `Sex`, `Branch`, `YearofStudying`, `Academic Year`, `DurationOfCourse`, `FatherName`, `MotherName`, `GuardianName`, `ContactNo`, `Email`, `PermanentAddress`, `CommunicationAddress`, `Community`, `State`, `FatherAnnualIncome`, `FatherOccupation`, `PercentageofMarksobtainedinHsc`, `Board/UniversityofExamination`, `Nationality`, `Religion`, `Caste`, `BloodGroup`, `PhoneOff`, `PhoneRes`, `PCM`, `PCB`, `MotherTongue`, `DocumentDate`, `Weight-kg`, `Height-cm`, `Section`, `AdmissionCategory`, `EnrolledStatus`, `Hostel/DayScholar`, `Accounthead`, `Ledger`, `Semester`, `Physicallychallenged`, `ParentContactNumber`, `ParentMailId`, `EducationalQualification`, `NameoftheUniversity`, `YearofPassing`, `NameoftheInstitution` FROM `main` WHERE RegNo = '$line[2]'");
      $result =mysqli_query($conn,$query1);
      $numrows=mysqli_num_rows($result);
      if ($numrows > 0)
        echo "Data Already Exists,try again";
	  else{
echo "<script>alert('hrllo'); //location.href='admin.php';</script>";
$cmd=sprintf("INSERT INTO `main`(`SlNo`, `StudentId`, `RegNo`, `StudentName`, `Program`, `DOB`, `Sex`, `Branch`, `YearofStudying`, `Academic Year`, `DurationOfCourse`, `FatherName`, `MotherName`, `GuardianName`, `ContactNo`, `Email`, `PermanentAddress`, `CommunicationAddress`, `Community`, `State`, `FatherAnnualIncome`, `FatherOccupation`, `PercentageofMarksobtainedinHsc`, `Board/UniversityofExamination`, `Nationality`, `Religion`, `Caste`, `BloodGroup`, `PhoneOff`, `PhoneRes`, `PCM`, `PCB`, `MotherTongue`, `DocumentDate`, `Weight-kg`, `Height-cm`, `Section`, `AdmissionCategory`, `EnrolledStatus`, `Hostel/DayScholar`, `Accounthead`, `Ledger`, `Semester`, `Physicallychallenged`, `ParentContactNumber`, `ParentMailId`, `EducationalQualification`, `NameoftheUniversity`, `YearofPassing`, `NameoftheInstitution`) 
VALUES('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."','".$line[10]."','".$line[11]."','".$line[12]."','".$line[13]."','".$line[14]."','".$line[15]."','".$line[16]."','".$line[17]."','".$line[18]."','".$line[19]."','".$line[20]."','".$line[21]."','".$line[22]."','".$line[23]."','".$line[24]."','".$line[25]."','".$line[26]."','".$line[27]."','".$line[28]."','".$line[29]."','".$line[30]."','".$line[31]."','".$line[32]."','".$line[33]."','".$line[34]."','".$line[35]."','".$line[36]."','".$line[37]."','".$line[38]."','".$line[39]."','".$line[40]."','".$line[41]."','".$line[42]."','".$line[43]."','".$line[44]."','".$line[45]."','".$line[46]."','".$line[47]."','".$line[48]."','".$line[49]."') ");
$result=mysqli_query($conn,$cmd);
//echo $cmd;=
if($result)
$message.= "Data Uploaded successfully";
else
$str.= "data of $line[2] not Uploaded try again!";

if(!empty($str)) 
	 echo "<script>alert('$str')</script>";
echo "<script>alert('$message'); //location.href='admin.php';</script>";
}

   } fclose($csvFile);
     $qstring = '?status=succ';	
   }else
	{
     $qstring = '?status=invalid_file';
    }
  }
  echo 'nw';
?>