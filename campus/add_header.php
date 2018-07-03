<?php
include("dbconfig.php");
session_start();

	
	$username=$_SESSION['uname'];
 
	//Find the campus ID and institute ID
	$sql="SELECT campusID,instituteId from campus where campusUsername='$username'";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($res);
	$campId=$row[0];
	$instId=$row[1];
	
	//Find the institute Name
	$sql="SELECT instituteName from institute where instituteId='$instId'";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($res);
	$instName=$row[0];
	
 
 //GET values from form
 $schoolName = $_POST['schoolName'];
 $area = $_POST['area'];
 $pincode = $_POST['pincode'];
 $district = $_POST['district'];
 $state = $_POST['state'];
 $country = $_POST['country'];
 $phone1 = $_POST['phone1'];
 $phone2 = $_POST['phone2'];
 $fax = $_POST['fax'];
 $emailId = $_POST['emailId'];
 $website = $_POST['website'];
 $serviceinfo = $_POST['serviceinfo'];
 $designation = $_POST['designation'];
 $desgName = $_POST['desgname'];
 
 
 
 
 $sql="SELECT campusID from `campus_$instId` WHERE campusId='$campId'";
	$res=mysqli_query($conn,$sql);

	$maxsize = 10000000; //set to approx 10 MB
	
	if(mysqli_num_rows($res)=='0'){
 
	
                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['campLogo']['tmp_name']));
                    $imgData1 =addslashes (file_get_contents($_FILES['digiSign']['tmp_name']));
 
                    // our sql query
 $sql="INSERT INTO `campus_$instId`(`campusId`, `instituteId`, `instituteName`, `schoolName`,  `area`, `pincode`, `district`, `state`, `country`, `phone1`, `phone2`, `fax`, `emailId`, `website`, `serviceinfo`, `designation`, `desgName`,`camplogo`,`digisign`) VALUES ('$campId','$instId','$instName','$schoolName','$area', '$pincode', '$district', '$state', '$country', '$phone1', '$phone2', '$fax', '$emailId', '$website', '$serviceinfo', '$designation', '$desgName','{$imgData}','{$imgData1}')";
$res=mysqli_query($conn,$sql);
                    
    //echo $sql;
                    
	}
	else if(mysqli_num_rows($res)=='1'){
 
                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['campLogo']['tmp_name']));
                    $imgData1 =addslashes (file_get_contents($_FILES['digiSign']['tmp_name']));
 
                    // our sql query
 $sql="UPDATE `campus_$instId` SET `campusId`='$campId',`instituteId`='$instId',`area`='$area',`pincode`='$pincode',`district`='$district',`state`='$state',`country`='$country',`phone1`='$phone1',`phone2`='$phone2',`fax`='$fax',`emailId`='$emailId',`website`='$website',`serviceinfo`='$serviceinfo',`designation`='$designation',`desgName`='$desgName',`campLogo`='{$imgData}',`digisign`='{$imgData1}' WHERE campusId='$campId'";
$res=mysqli_query($conn,$sql);
                    
    
                   
       
	}
    echo "<script type='text/javascript'>alert('Header Updated');location.href='create_header.php';</script>";

 

 
 

?>