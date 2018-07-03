 <?php
 require_once 'dbconfig.php';
 session_start();
 ob_clean();
 ?>
 <!DOCTYPE html>
  <html>
    <header>
           <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
	  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css'>


	  
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
		<br>
		<h4>Admin | Manage Instituition</h4>
		<hr>
		
		<br>
	
	  	<div class="conatiner">
		

       
  
<form class="center" id="itable">
		
<div id="inst_table">
	   <table class="striped responsive-table">
        <thead>
          <tr>
				 <th></th>
              <th>Campus Name</th>
              <th>Campus ID</th>
              <th>Campus Username</th>
              <th>Campus Password</th>
            
  		<th><input type="submit" name="save" value="Save" class="waves-effect waves-light btn lime green accent-3" ></th>
          </tr>
        </thead>

        <tbody>
		<?php
		
//instituteId
$uname=$_SESSION['uname'];
$sql=sprintf("SELECT instituteId FROM institute WHERE instituteUsername='$uname' ");
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);
$insId=$row[0];

		$sql="SELECT campusName,campusId,campusUsername,campusPassword FROM campus WHERE instituteId = $insId ";
		$res=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_row($res)){
		echo" <tr id=".$row[1]."><td>";
			echo '<input name="checkbox[]" type="checkbox" id="i'.$row[1].'" value="'.$row[1].'">
			<label for="i'.$row[1].'"></label>';
			echo '</td>
			<td id="country_row1" class="input-field"><input type="text" name="insname[]" value="'.$row[0].'"></td>
			<td id="age_row1" class="input-field"><input type="text" name="id[]" value="'.$row[1].'" readonly></td>
			<td id="sage_row1" class="input-field"><input type="text" name="uname[]" value="'.$row[2].'" ></td>
			<td id="sname_row1" class="input-field"><input type="password" name="pwd[]" value="'.$row[3].'" ></td>
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
  xhttp.open("GET", "camp_search.php?str="+str, true);
  xhttp.send();   
}
</script>
	
	
<script>
// this is the id of the form
$("#itable").submit(function(e) {
	
event.preventDefault();// using this page stop being refreshing
	
          $.ajax({
            type: 'POST',
            url: 'save.php',
            data: $('#itable').serialize(),
            success: function (data) {
              alert(data);
            }
		});
	
   
});
</script>
	  
	  
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="../logout.php" id="logout" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
