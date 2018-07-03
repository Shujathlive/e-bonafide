 <?php
 session_start();
 ob_clean();
 require_once 'dbconfig.php';
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

<?php include('menuadmin.php') ?>
			   <div class="container">
	  	<div class="conatiner">
		
		<div class="row">
       <div class="input-field col s6">
          <input id="search" name="search" type="text" class="validate" onkeyup="search(this.value)">
          <label for="search">Search</label>
        </div>

       
  
<form class="center" id="itable">
		
<div id="inst_table">
	   <table class="striped responsive-table">
        <thead>
          <tr>
				 <th></th>
              <th>Purpose Name</th>
              <th>Purpose ID</th>
          
            
  		<th><input type="submit" name="save" value="Save" class="waves-effect waves-light btn lime green accent-3" ></th>
          </tr>
        </thead>

        <tbody>
		<?php
		$uname=$_SESSION['uname'];
		$sql=sprintf("SELECT instituteId FROM institute WHERE instituteUsername='$uname' ");
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_row($res);
		$insId=$row[0];
		$sql="SELECT `campusId`, `instituteId`, `area`, `pincode`, `district`, `state`, `country`, `phone1`, `phone2`, `mobile`, `fax`, `emailId`, `website`, `serviceinfo`, `designation`, `desgName` FROM `campus_$insId`";
		$res=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_row($res)){
		echo" <tr id=".$row[0]."><td>";
			echo '<input name="checkbox[]" type="checkbox" id="i'.$row[0].'" value="'.$row[0].'">
			<label for="i'.$row[0].'"></label>';
			echo '</td>
			<td id="country_row1" class="input-field"><input type="text" name="campusid[]" value="'.$row[0].'"></td>
			<td id="age_row1" class="input-field"><input type="text" name="instituteid[]" value="'.$row[1].'"></td>
			<td id="age_row2" class="input-field"><input type="text" name="area[]" value="'.$row[2].'"></td>
			<td id="age_row3" class="input-field"><input type="text" name="pincode[]" value="'.$row[3].'"></td>
			<td id="age_row4" class="input-field"><input type="text" name="district[]" value="'.$row[4].'"></td>
			<td id="age_row5" class="input-field"><input type="text" name="state[]" value="'.$row[5].'"></td>
			<td id="age_row6" class="input-field"><input type="text" name="country[]" value="'.$row[6].'"></td>
			<td id="age_row7" class="input-field"><input type="text" name="phone1[]" value="'.$row[7].'"></td>
			<td id="age_row8" class="input-field"><input type="text" name="phone2[]" value="'.$row[8].'"></td>
			<td id="age_row9" class="input-field"><input type="text" name="mobile[]" value="'.$row[9].'"></td>
			<td id="age_row10" class="input-field"><input type="text" name="fax[]" value="'.$row[10].'"></td>
			<td id="age_row11" class="input-field"><input type="text" name="emailid[]" value="'.$row[11].'"></td>
			<td id="age_row12" class="input-field"><input type="text" name="website[]" value="'.$row[12].'"></td>
			<td id="age_row13" class="input-field"><input type="text" name="serviceinfo[]" value="'.$row[13].'"></td>
			<td id="age_row14" class="input-field"><input type="text" name="designation[]" value="'.$row[14].'"></td>
			<td id="age_row15" class="input-field"><input type="text" name="desgName[]" value="'.$row[15].'"></td>
			</tr>';
		}
		?>
          
        </tbody>
      </table>
	  </div>
	  </form>
	  </div>
	  </div>
	
  </main>  
  	 

	 
	  <!--Import jQuery before materialize.js-->

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
	  
	 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script type="text/javascript">
	
	var globalVariable={
       regNo: '<?php
	   echo $_SESSION['uname'];?>'
    };
	

	</script>
	
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
function search(str) {
  var xhttp;
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("inst_table").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "purp_search.php?str="+str, true);
  xhttp.send();   
}
</script>
	
	
<script>
// this is the id of the form
$("#itable").submit(function(e) {
	
event.preventDefault();// using this page stop being refreshing
	var tc = $(this).find("input[type=submit]:focus").val();
		if(tc == 'Delete'){
          $.ajax({
            type: 'POST',
            url: 'deldata.php',
            data: $('#itable').serialize(),
            success: function (data) {
              alert(data);
            }
		});
		}
		else if(tc == 'Save'){
          $.ajax({
            type: 'POST',
            url: 'savedata.php',
            data: $('#itable').serialize(),
            success: function (data) {
              alert(data);
            }
		});
		}

   
});
</script>
	  
	<script type="text/javascript" src="bonafide.js"></script>
    
	
	  
	  
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="../logout.php" id="logout" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
