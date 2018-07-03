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
 
 
 
 //Insert
 $sql="INSERT INTO institute (INSERT INTO `campus_$instId`(`campusId`, `instituteId`, `area`, `pincode`, `district`, `state`, `country`, `phone1`, `phone2`, `mobile`, `fax`, `emailId`, `website`, `serviceinfo`, `designation`, `desgName`, `image`) VALUES (`$campId`,`$instId`,`$area`, `$pincode`, `$district`, `$state`, `$country`, `$phone1`, `$phone2`, `$fax`, `$emailId`, `$website`, `$serviceinfo`, `$designation`, `$desgName`)";
$res=mysqli_query($conn,$sql);
 
 
 
 $name = $_FILES['campLogo']['name'];
 $target_dir = "img/";
 $target_file = $target_dir . basename($name); 
 // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array("jpg","jpeg","png","gif");

 // Check extension
 if( in_array($imageFileType,$extensions_arr) ){
 
  // Convert to base64 
  $image_base64 = base64_encode(file_get_contents($_FILES['campLogo']['tmp_name']) );
  $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
  // Insert record
  $query = "insert into campus_$instId(image) values(`$image`)";
  $res = mysqli_query($conn,$query);
	if($res){
		echo 'success';
	}
	else{
		echo $query;
		echo 'fail';
	}
 }
 
}
?>