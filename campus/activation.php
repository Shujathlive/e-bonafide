<?php
require_once 'dbconfig.php';
session_start();

$username=$_SESSION['uname'];
$act=$_POST['act'];

					if($act){
						$sql1="UPDATE campus SET cctcactivate = '1' WHERE campusName = '$username'";
						$res1=mysqli_query($conn,$sql1);
						echo 'CC and TC Activated!';
}
					else{
						$sql1="UPDATE campus SET cctcactivate = '0' WHERE campusName = '$username'";
						$res1=mysqli_query($conn,$sql1);
						echo 'CC and TC Deactivated!';
					}

?>