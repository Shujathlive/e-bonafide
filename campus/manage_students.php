<?php
 session_start();
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
  <form class="center" id="itable">

  <br>
  <br>
  <br>
   <ul id="tabs-swipe-demo" class="tabs">
    <li class="tab col s3"><a href="#test-swipe-1">Create Student</a></li>
    <li class="tab col s3"><a class="active" href="#test-swipe-2">Delete Student</a></li>
    <li class="tab col s3"><a href="#test-swipe-3">Update/Delete Year</a></li>
  </ul>
  <div id="test-swipe-1" class="col s12">Test 1</div>
  <div id="test-swipe-2" class="col s12">
  <table>
  <tr>
  <div class="row">
    <br>
    <br>
	<div class="input-field col s6">
          <input id="search" name="search" type="text" class="validate" onkeyup="search(this.value)">
          <label for="search">Search</label>
        </div>

	<input type="submit" name="Delete" value="Delete" class="waves-effect waves-light btn red accent-3" >
	
	</div>		
<div id="inst_table">

</div>
</td>
</tr>
</table>
  </div>
  <div id="test-swipe-3" class="col s12">

	   <table class="striped responsive-table">
        <thead>
          <tr>
			  <th>Select Year</th>
              <th>Update Year</th>
              <th>Delete Year</th>
        </thead>

        <tbody>
			<tr>
				<td>
					  <div class="input-field col s6">
						<select id="year" name="year" class="browser-default">
						  <option value="" disabled selected>Choose your option</option>
						  <option value="1">Year 1</option>
						  <option value="2">Year 2</option>
						  <option value="3">Year 3</option>
						  <option value="4">Year 4</option>
						</select>
					  </div>
				</td>
				<td><input type="submit" name="Update" value="Update" class="waves-effect waves-light btn green accent-3" ></td>
				<td><input type="submit" name="Remove" value="Remove" class="waves-effect waves-light btn red accent-3" ></td>
			</tr>
        </tbody>
      </table>
	</div>
       	
	  </form>
 
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
  xhttp.open("GET", "stud_search.php?str="+str, true);
  xhttp.send();   
}
</script>
	
	
<script>
// this is the id of the form
$("#itable").submit(function(e) {
	
event.preventDefault();// using this page stop being refreshing
	var tc = $(this).find("input[type=submit]:focus").val();
	
		if(tc == 'Update/Delete'){
          $.ajax({
            type: 'POST',
            url: 'updatendelyr.php',
            data: $('#itable').serialize(),
            success: function (data) {
              alert(data);
            }
		});
		}
		else if(tc == 'Delete'){
          $.ajax({
            type: 'POST',
            url: 'delstud.php',
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
			