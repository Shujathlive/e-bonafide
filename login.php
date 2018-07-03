
<?php
require('dbconfig.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['submit'])){
        // removes backslashes
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	// removes backslashes
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	
	//session the username
	//$_SESSION['uname']=$username;
	$_SESSION['uname']=$username;
	$decpwd = md5($password);
	//admin
	$admin = sprintf("SELECT RegNo,DOB FROM main WHERE RegNo='".$username."' AND DOB='".$decpwd."'");
	//institute
	$inst = sprintf("SELECT instituteUsername,institutePassword FROM institute WHERE instituteUsername='".$username."' AND institutePassword='".$password."'");
	//campus
	$camp = sprintf("SELECT campusUsername,campusPassword FROM campus WHERE campusUsername='".$username."' AND campusPassword='".$password."'");
	//accounts
	$acc = sprintf("SELECT accountsUsername,accountsPassword FROM accounts WHERE accountsUsername='$username' AND accountsPassword='$password'");
	
	
	
	
	// Perform Query

	//admin
	$ad=mysqli_num_rows(mysqli_query($conn,$admin));     //institute 
	$i=mysqli_num_rows(mysqli_query($conn,$inst));     
	//campus 
	$c=mysqli_num_rows(mysqli_query($conn,$camp));     
	//accounts
	$ac=mysqli_num_rows(mysqli_query($conn,$acc));      
	  
	
	
	
	
	
	//Find the role
	if($ad==1){
		$message = "Successfully logged-in!";
echo "<script type='text/javascript'>alert('$message');location.href='admin/create_institute.php';</script>";
	}
	else if($i==1){
		$message = "Successfully logged-in!";
echo "<script type='text/javascript'>alert('$message');location.href='institute/create_campus.php';</script>";
	}
	else if($c==1){
		$message = "Successfully logged-in!";
echo "<script type='text/javascript'>alert('$message');location.href='campus/create_student.php';</script>";
	}
	else if($ac==1){
		$message = "Successfully logged-in!";
echo "<script type='text/javascript'>alert('$message');location.href='create_accounts.php';</script>";
	}
	else{
		//student
	$schk="SHOW TABLES LIKE '%student_%'";
	
	$sres=mysqli_query($conn,$schk);
	while($row=mysqli_fetch_row($sres)){
		$stable=$row[0];
		echo "<script type='text/javascript'>console.log('$stable');</script>";
	$stud = sprintf("SELECT RegNo,DOB FROM $stable WHERE RegNo='".$username."' AND DOB='".$password."'");
	$s=mysqli_num_rows(mysqli_query($conn,$stud));
echo "<script type='text/javascript'>console.log('$s');</script>";	
	if ($s == '1') {
		$_SESSION['stable']=$stable;
        $stud=1;
		break;
    }
	}
	if($stud==1){
		$message = "Successfully logged-in!";
echo "<script type='text/javascript'>alert('$message');location.href='indexstud.php';</script>";
	}
	else {
		$message = "Check Username/password";
		
echo "<script type='text/javascript'>alert('$message');location.href='index.php';</script>";
	}
	}
}
?>
