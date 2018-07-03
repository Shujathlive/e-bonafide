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
		$sql="SELECT purposeName,purposeId FROM purpose ";
		$res=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_row($res)){
		echo" <tr id=".$row[1]."><td>";
			echo '<input name="checkbox[]" type="checkbox" id="i'.$row[1].'" value="'.$row[1].'">
			<label for="i'.$row[1].'"></label>';
			echo '</td>
			<td id="country_row1" class="input-field"><input type="text" name="pname[]" value="'.$row[0].'"></td>
			<td id="age_row1" class="input-field"><input type="text" name="pid[]" value="'.$row[1].'"></td>
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
            url: 'delpurpose.php',
            data: $('#itable').serialize(),
            success: function (data) {
              alert(data);
            }
		});
		}
		else if(tc == 'Save'){
          $.ajax({
            type: 'POST',
            url: 'savepurpose.php',
            data: $('#itable').serialize(),
            success: function (data) {
              alert(data);
            }
		});
		}

   
});
</script>

	  
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="../logout.php" id="logout" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
