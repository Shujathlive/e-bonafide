<?php
require_once 'dbconfig.php';
session_start();




//auto-gen pwd
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}

$password = random_password(8);
$insName=$_POST['inst_name'];
$username = 'inst_'.str_replace(' ', '', $insName); //campus table name

$sql="INSERT INTO institute (instituteName,instituteUsername,institutePassword)
VALUES ('$insName','$username','$password');";
$res=mysqli_query($conn,$sql);

////////////////////////////////////////////////////////////////////////////////////
//instituteId
$uname=$_SESSION['uname'];
$sql=sprintf("SELECT instituteId FROM institute WHERE instituteUsername='$username' ");
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);
$insId=$row[0];

//Find the campus ID
$sql="SELECT campusID from campus where campusUsername='$username'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);
$campId=$row[0];



//Campus Table Name
$campTable='campus_'.$insId.$campId;

//Create Campus Table
$sql="CREATE TABLE $campTable (
    campusId int(5) ,
    instituteId int(5) ,
	instituteName varchar(100) ,
	schoolName varchar(100) ,
	area varchar(100) ,
	pincode varchar(10) ,
	district varchar(100) ,
	state varchar(100),
	country varchar(100),
	phone1 varchar(100),
	phone2 varchar(100),
	fax varchar(100),
	emailId varchar(255),
	website varchar(100),
	serviceinfo varchar(500),
	designation varchar(100),
	desgName varchar(100),
    PRIMARY KEY (campusId)
)";
$res=mysqli_query($conn,$sql);


if($res){
	echo "<script type='text/javascript'>location.href='create_institute.php';</script>";
}
else{
	
}

?>