		<?php
			 session_start();
			 require_once 'dbconfig.php';
			$username=$_SESSION['uname']; 
			//Find the campus ID
			$sql="SELECT campusID from campus where campusUsername='$username'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_row($res);
			$campId=$row[0];
	
			//Find the institute ID
			$sql1="SELECT instituteId from campus where campusId='$campId'";
			$res1=mysqli_query($conn,$sql2);
			$row1=mysqli_fetch_row($res2);
			$instId=$row1[0];

			$stable='student_'.$instId.$campId;
			
			$sql2="UPDATE `$stable` SET `YearofStudying`=`YearofStudying`+1";
			$res2=mysqli_query($conn,$sql1);
			$sql3="DELETE FROM `$stable` WHERE `YearofStudying`>4";
			$res3=mysqli_query($conn,$sql1);
			
			if($res2 && $res3){
					echo "Year Updated and Pass-outs Deleted!";
			}
			else{
				echo "Oops, Failed to execute!";
			}
			
			}
		?>
          