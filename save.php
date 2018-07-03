<?php
if(!empty($_POST['checkbox'])){
require_once 'dbconfig.php';
$insname = $_POST['insname'];

$checkid = $_POST['id'];
$username = $_POST['uname'];
$password = $_POST['pwd'];
$x=sizeof($password);
$flag=0;
for($i=0;$i<$x;$i++)
{
	$query = sprintf("UPDATE Institute SET instituteName='$insname[$i]',instituteUsername='$username[$i]',InstitutePassword='$password[$i]' WHERE instituteId='$checkid[$i]' ");

	$res = mysqli_query($conn,$query);
	if($res && mysqli_affected_rows($conn)>=0)
		$flag+=1;
}
if($flag==$x)
	echo "users updated";
else
	echo ($x-$flag).' users not updated';
}
else{
	echo 'Select a row to update';
}
?>