 <?php
session_start();
//load the database configuration file
include 'dbconfig.php';

?>

 <!DOCTYPE html>
  <html>
    <header>
           <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
	  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css'>


	  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>

  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
</style>
    </header>

    <main>


	  	<?php include('menucampus.php') ?>
	  <div class="container">
		
	 <br>
	 <h4>Campus | Add Header</h4><br>
	 <h5>Header Preview</h5>
		 <div class="row">
			 <table class="col s6 striped responsive-table" id='instData'>
        <thead>
          <tr>
              <th>campusId</th>
			  <th>instituteId</th>
			  <th>instituteName</th>
			  <th>School Name</th>
			  <th>area</th>
			  <th>pincode</th>
			  <th>district</th>
			  <th>state</th>
			  <th>country</th>
			  <th>phone1</th>
			  <th>phone2</th>
			  <th>fax</th>
			  <th>emailId</th>
			  <th>website</th>
			  <th>serviceinfo</th>
			  <th>designation</th>
			  <th>desgName</th>
              
          </tr>
        </thead>

        <tbody>
		<?php
		$username=$_SESSION['uname'];
		
		//Find the campus ID and institute ID
	$sql="SELECT campusID,instituteId from campus where campusUsername='$username'";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($res);
	$campId=$row[0];
	$instId=$row[1];
		$sql="SELECT `campusId`, `instituteId`, `area`, `pincode`, `district`, `state`, `country`, `phone1`, `phone2`, `fax`, `emailId`, `website`, `serviceinfo`, `designation`, `desgName`,instituteName,schoolName FROM `campus_$instId`";
		$res=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_row($res)){
			echo" <tr><td>";
			echo $row[0];
			echo "</td><td>";
			echo $row[1];
			echo "</td><td>";
			echo $row[15];
			echo "</td><td>";
			echo $row[16];
			echo "</td><td>";
			echo $row[2];
			echo "</td><td>";
			echo $row[3];
			echo "</td><td>";
			echo $row[4];
			echo "</td><td>";
			echo $row[5];
			echo "</td><td>";
			echo $row[6];
			echo "</td><td>";
			echo $row[7];
			echo "</td><td>";
			echo $row[8];
			echo "</td><td>";
			echo $row[9];
			echo "</td><td>";
			echo $row[10];
			echo "</td><td>";
			echo $row[11];
			echo "</td><td>";
			echo $row[12];
			echo "</td><td>";
			echo $row[13];
			echo "</td><td>";
			echo $row[14];
			echo"</td></tr>";
		}
		?>
         
        </tbody>
      </table>
	
	    </div>
	  <div class="container">
		<br>
		
		    <div class="row center">
						
				  <form action="add_header.php" method="post" enctype="multipart/form-data" id="importFrm">
					<div class="row">
        <div class="input-field col s12">
          <input id="area" name="area" type="text" class="validate" required>
          <label for="area">Area</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="pincode" name="pincode" type="text" class="validate" required>
          <label for="pincode">Pincode</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="district" name="district" type="text" class="validate" required>
          <label for="district">District</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="state" name="state" type="text" class="validate" required>
          <label for="state">State</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="country" name="country" type="text" class="validate" required>
          <label for="country">Country</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="phone1" name="phone1" type="text" class="validate" required>
          <label for="phone1">Phone 1</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="phone2" name="phone2" type="text" class="validate" required>
          <label for="phone2">Phone 2</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="fax" name="fax" type="text" class="validate" required>
          <label for="fax">Fax</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="emailId" name="emailId" type="text" class="validate" required>
          <label for="emailId">Email ID</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="website" name="website" type="text" class="validate" required>
          <label for="website">Campus Website</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="serviceinfo" name="serviceinfo" type="text" class="validate" required>
          <label for="serviceinfo">Service Info</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="designation" name="designation" type="text" class="validate" required>
          <label for="designation">Designation</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="desgname" name="desgname" type="text" class="validate" required>
          <label for="desgname">Designated Official Name</label>
        </div>
      </div>
	<div class="file-field input-field">
					  <div class="btn">
						<span>Campus Logo</span>
						<input type="file" id="file" name="campLogo">
					  </div>
					  <div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload one or more files">
					  </div>
					</div>
					<div class="file-field input-field">
					  <div class="btn">
						<span>Digital Sign</span>
						<input type="file" id="file" name="digiSign">
					  </div>
					  <div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload one or more files">
					  </div>
					</div>
     	
				  
			</div>
		
			<center>		
			<button type="submit" name="submit" class="waves-effect waves-light btn green" >Submit</button>
			
		</center>
		
	  </div>
	  </form>
 </div>    	 

	 
	  <!--Import jQuery before materialize.js-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	  <!-- Compiled and minified JavaScript -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
	  <script>
		  $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true, // Choose whether you can drag to open on touch screens,
      onOpen: function(el) { /* Do Stuff*/ }, // A function to be called when sideNav is opened
      onClose: function(el) { /* Do Stuff*/ }, // A function to be called when sideNav is closed
    }
  );
  $(document).ready(function() {
         $('select').material_select();
      });
    				   $(document).ready(function() {
    Materialize.updateTextFields();
  });    
	  </script>
    </main>
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="logout.php" id="download" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
