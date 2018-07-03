<?php
require_once 'dbconfig.php';
			session_start();
			$sql="SELECT campusID from campus where campusUsername='$username'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_row($res);
			$campId=$row[0];
	
			//Find the institute ID
			$sql2="SELECT instituteId from campus where campusId='$campId'";
			$res2=mysqli_query($conn,$sql2);
			$row2=mysqli_fetch_row($res2);
			$instId=$row2[0];

			$stable='student_'.$instId.$campId;
		
$studId=$_POST['checkbox'];

 foreach($studId as $delid){ 
     $delid=str_replace('/','',$delid);

$sql = sprintf("DELETE FROM `$stable` WHERE RegNo='$delid'");
$res = mysqli_query($conn,$sql);
if($res){
	
echo "Deleted Student/s";
}
else{
	
echo "Failed to Delete!";
}
}

?>