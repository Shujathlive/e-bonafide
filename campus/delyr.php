		<?php
			 session_start();
			 require_once 'dbconfig.php';
			$username=$_SESSION['uname']; 
			
			if(!isset($_POST['year'])){
					echo "Year Not Selected!";
			}
			else{
			$year=$_POST['year'];
			//Find the campus ID
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
		
			$sql1="DELETE FROM `$stable` WHERE `YearofStudying`=$year";
			echo $sql;
			echo $sql2;
			echo $sql1;
			$res1=mysqli_query($conn,$sql1);
			if($res1){
					echo "Year Deleted!";
			}
			else{
				echo "Year NOT Deleted!";
			}
			}
		?>
          