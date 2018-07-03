<?php
include("dbconfig.php");
session_start();

if(isset($_POST['submit'])){
	
	$username=$_SESSION['uname'];
 
	//Find the campus ID and institute ID
	$sql="SELECT campusID,instituteId from campus where campusUsername='$username'";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($res);
	$campId=$row[0];
	$instId=$row[1];
	
 
 //GET values from form
 $instName = $_POST['instName'];
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
 
	//check associated error code
    if($_FILES['campLogo']['error']==UPLOAD_ERR_OK||$_FILES['digiSign']['error']==UPLOAD_ERR_OK) {
 
        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($_FILES['campLogo']['tmp_name'])||is_uploaded_file($_FILES['digiSign']['tmp_name'])) {    
 
            //checks size of uploaded image on server side
            if( $_FILES['campLogo']['size'] < $maxsize||$_FILES['digiSign']['size'] < $maxsize) {    
 
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
 
                //checks whether uploaded file is of image type
                if(strpos(finfo_file($finfo, $_FILES['campLogo']['tmp_name']),"image")===0) {    
 
                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['campLogo']['tmp_name']));
                    $imgData1 =addslashes (file_get_contents($_FILES['digiSign']['tmp_name']));
 
                    // our sql query
 $sql="INSERT INTO `campus_$instId`(`campusId`, `instituteId`, `area`, `pincode`, `district`, `state`, `country`, `phone1`, `phone2`, `fax`, `emailId`, `website`, `serviceinfo`, `designation`, `desgName`,`camplogo`,`digisign`) VALUES ('$campId','$instId','$area', '$pincode', '$district', '$state', '$country', '$phone1', '$phone2', '$fax', '$emailId', '$website', '$serviceinfo', '$designation', '$desgName','{$imgData}','{$imgData1}')";
$res=mysqli_query($conn,$sql);
                    
    
                    // insert the image
 
                    $msg='<p>Image successfully saved in database . </p>';
                }
                else
                    $msg="<p>Uploaded file is not an image.</p>";
            }
             else {
                // if the file is not less than the maximum allowed, print an error
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['campLogo']['name'].' is '.$_FILES['campLogo']['size'].
                ' bytes</div><hr />';
                }
        }
        else
            $msg="File not uploaded successfully.";
 
    }
    else {
        $msg= file_upload_error_message($_FILES['campLogo']['error']);
    }
	}
	else if(mysqli_num_rows($res)=='1'){
		//check associated error code
    if($_FILES['campLogo']['error']==UPLOAD_ERR_OK||$_FILES['digiSign']['error']==UPLOAD_ERR_OK) {
 
        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($_FILES['campLogo']['tmp_name'])||is_uploaded_file($_FILES['digiSign']['tmp_name'])) {    
 
            //checks size of uploaded image on server side
            if( $_FILES['campLogo']['size'] < $maxsize||$_FILES['digiSign']['size'] < $maxsize) {    
 
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
 
                //checks whether uploaded file is of image type
                if(strpos(finfo_file($finfo, $_FILES['campLogo']['tmp_name']),"image")===0) {    
 
                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['campLogo']['tmp_name']));
                    $imgData1 =addslashes (file_get_contents($_FILES['digiSign']['tmp_name']));
 
                    // our sql query
 $sql="UPDATE `campus_37` SET `campusId`='$campId',`instituteId`='$instId',`area`='$area',`pincode`='$pincode',`district`='$district',`state`='$state',`country`='$country',`phone1`='$phone1',`phone2`='$phone2',`fax`='$fax',`emailId`='$emailId',`website`='$website',`serviceinfo`='$serviceinfo',`designation`='$designation',`desgName`='$desgName',`campLogo`='{$imgData}',`digisign`='{$imgData1}' WHERE campusId='$campId'";
$res=mysqli_query($conn,$sql);
                    
    
                    // insert the image
 
                    $msg='<p>Image successfully saved in database . </p>';
                }
                else
                    $msg="<p>Uploaded file is not an image.</p>";
            }
             else {
                // if the file is not less than the maximum allowed, print an error
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['campLogo']['name'].' is '.$_FILES['campLogo']['size'].
                ' bytes</div><hr />';
                }
        }
        else
            $msg="File not uploaded successfully.";
 
    }
    else {
        $msg= file_upload_error_message($_FILES['campLogo']['error']);
    }
	}
    echo "<script type='text/javascript'>location.href='create_header.php';</script>";
}
 

 
 

?>