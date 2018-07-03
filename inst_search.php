<?php
require_once 'dbconfig.php';
session_start();

//get search string
$str=$_GET['str'];
echo '<table class="striped responsive-table">
        <thead>
          <tr>
              <th></th>
              <th>Instituition Name</th>
              <th>Instituition ID</th>
              <th>Instituition Username</th>
              <th>Instituition Password</th>
              <th><button class="btn red waves-effect waves-light" type="submit" name="action">Delete
  </button></th>
              
          </tr>
        </thead>

        <tbody>';
		
		$sql="SELECT instituteName,instituteId,instituteUsername,institutePassword FROM institute WHERE instituteUsername LIKE '$str%' OR instituteId LIKE '$str%' OR instituteName LIKE '$str%'";
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
			echo"</td></tr>";
		}
		          
        echo'</tbody>
      </table>';
?>