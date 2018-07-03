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
//get search string
$str=$_GET['str'];
echo '<table class="striped responsive-table">
        <thead>
          <tr>
              <th></th>
              <th>Student Name</th>
              <th>Student ID</th>
			  <th>Program</th>
              <th>Branch</th>
              <th>Year Of Studying</th>
              <th>Academic Year</th>
        
              
          </tr>
        </thead>

        <tbody>';
		
		$sql="SELECT  `StudentName`,`RegNo`, `Program`, `Branch`, `YearofStudying`, `Academic Year` FROM `$stable` WHERE `StudentName` LIKE '$str%' OR `RegNo` LIKE '$str%' OR `Branch` LIKE '$str%'";
		
		$res=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_row($res)){
			echo" <tr><td>";
			echo '<input name="checkbox[]" type="checkbox" id="checkbox[]" value="'.$row[1].'"><label for="checkbox[]"></label>';
			echo "</td><td>";
			echo $row[0];
			echo "</td><td>";
			echo $row[1];
			echo "</td><td>";
			echo $row[2];
			echo "</td><td>";
			echo $row[3];
			echo "</td><td>";
			echo $row[4];
			echo "</td><td>";
			echo $row[5];
			echo"</td></tr>";
		}
		          
        echo'</tbody>
      </table>';
?>