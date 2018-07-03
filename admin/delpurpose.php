<?php
require_once 'dbconfig.php';
$sql="SELECT * FROM purpose";
$result=mysqli_query($conn,$sql);

$pId=$_POST['checkbox'];
echo $pId;
 foreach($pId as $delid){ 
     $delid=str_replace('/','',$delid);

$sql = sprintf("DELETE FROM purpose WHERE purposeId='$delid'");
echo $sql;
$res = mysqli_query($conn,$sql);
}
?>