<?php
require_once 'dbconfig.php';
$sql="SELECT * FROM institute";
$result=mysqli_query($conn,$sql);

$instId=$_POST['checkbox'];
$count = count($instId);
for($i=0;$i<$count;$i++){
$inst=$instId[$i];
$sql = sprintf("DELETE FROM institute WHERE instituteId='$inst'");
$res = mysqli_query($conn,$sql);
$sql = sprintf("DELETE FROM campus WHERE instituteId='$inst'");
$res = mysqli_query($conn,$sql);
$sql = sprintf("DELETE FROM accounts WHERE instituteId='$inst'");
$res = mysqli_query($conn,$sql);
$sql1 = "SHOW TABLES
FROM `ebonafide`
WHERE 
    `Tables_in_ebonafide` LIKE 'campus_$inst%'
    OR 
	`Tables_in_ebonafide` LIKE 'accounts_$inst%'
	OR 
	`Tables_in_ebonafide` LIKE 'student_$inst%'
	;";
$res1 = mysqli_query($conn,$sql1);
while($row=mysqli_fetch_row($res1)){
	$deltable=$row[0];
$sql2 = "DROP TABLE $deltable;";
$res2 = mysqli_query($conn,$sql2);

}
echo $inst;
}
?>