<?php
if(!empty($_POST['checkbox'])){
require_once 'dbconfig.php';
$puname = $_POST['pname'];

$checkid = $_POST['pid'];
$x=sizeof($puname);
$flag=0;
for($i=0;$i<$x;$i++)
{
	$query = sprintf("UPDATE purpose SET purposeName='$puname[$i]',purposeId='$checkid[$i]' WHERE purposeId='$checkid[$i]' ");

	$res = mysqli_query($conn,$query);
	if($res && mysqli_affected_rows($conn)>=0)
		$flag+=1;
}
if($flag==$x)
	echo "purpose updated";
else
	echo ($x-$flag).' purpose not updated';
}
else{
	echo 'Select a row to update';
}
?>