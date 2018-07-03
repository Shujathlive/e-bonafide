<?php
require_once 'dbconfig.php';
$sql="SELECT * FROM institute";
$result=mysqli_query($conn,$sql);

$instId=$_POST['checkbox'];

 foreach($instId as $delid){ 
     $delid=str_replace('/','',$delid);

$sql = sprintf("DELETE FROM institute WHERE instituteId='$delid'");
$res = mysqli_query($conn,$sql);
$sql1 = "SHOW TABLES
FROM `ebonafide`
WHERE 
    `Tables_in_ebonafide` LIKE 'campus_$delid%'
    OR 
	`Tables_in_ebonafide` LIKE 'accounts_$delid%'
	OR 
	`Tables_in_ebonafide` LIKE 'student_$delid%'
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