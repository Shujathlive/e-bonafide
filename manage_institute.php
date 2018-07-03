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

		
	  <nav class="cyan">
	<div class="nav-wrapper">
    <a href="#!" class="brand-logo center">e-Bonafide</a>
    <ul class="right ">
		
      <li class="hide-on-med-and-down"><?php 
	  $uname=$_SESSION['uname'];
	  echo "Welcome, ".$uname;?></li>  
      <!-- Dropdown Trigger -->
      <li class="right show-on-med-and-down"><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons right">menu</i></a></li>
	  
    </ul>
  </div>
	  </nav>
	  <ul id="dropdown1" class="dropdown-content">
		  <li><a href="admindash.php">Dashboard</a></li>
		  <li class="divider"></li>
		  <br>
		  <label><h6 class="center">Instituition</h6></label>
		  
		  <li><a href="create_institute.php">Create User</a></li>
		  <li><a href="manage_institute.php">Manage User</a></li>
		  <li class="divider"></li>
		  <li><a href="add_purpose.php">Add Purpose</a></li>
		  <li><a href="manage_purpose.php">Manage Purpose</a></li>
		  <li class="divider"></li>
		  <li><a href="changepassword.php">Change Password</a></li>
		</ul>

	  <div class="container">
		<br>
		<h4>Admin | Manage Instituition</h4>
		<hr>
		
		<br>
	
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
              <th>Instituition Name</th>
              <th>Instituition ID</th>
              <th>Instituition Username</th>
              <th>Instituition Password</th>
              <th><input type="submit" name="delete" value="Delete" class="waves-effect waves-light btn red " ></th>
              <th><input type="submit" name="save" value="Save" class="waves-effect waves-light btn green " ></th>
          </tr>
        </thead>

        <tbody>
		<?php
		$sql="SELECT instituteName,instituteId,instituteUsername,institutePassword FROM institute ";
		$res=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_row($res)){
			echo" <tr id=i_".$row[1]."><td>";
			echo '<input name="checkbox[]" type="checkbox" id="i'.$row[1].'" value="'.$row[1].'">
			<label for="i'.$row[1].'"></label>';
			echo "</td><td>";
			echo '<input type="text" name="insname[]" value="'.$row[0].'">';
			echo "</td><td>";
			echo $row[1];
			echo "</td><td>";
			echo '<input type="text" name="uname[]" value="'.$row[2].'" >';
			echo "</td><td>";
			echo '<input type="text" name="pwd[]" value="'.$row[3].'" >';
			echo"</td></tr>";
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
  xhttp.open("GET", "inst_search.php?str="+str, true);
  xhttp.send();   
}
</script>
	
	
<script>
// this is the id of the form
$("#itable").submit(function(e) {
e.preventDefault();
 var tc = $(this).find("input[type=submit]:focus").val();
if(tc == 'Delete'){
    var url = "delinst.php"; // the script where you handle the form input.
	  
    $.ajax({
           type: "POST",
           url: url,
           data: $("#itable").serialize(), // serializes the form's elements.
           success: function(data)
           {
				   var row = document.getElementById('i_'+data);
					row.parentNode.removeChild(row);
			   
           }
         });
}
else if(tc == 'Save'){ 
	var url = "save.php"; // the script where you handle the form input.
	  
    $.ajax({
           type: "POST",
           url: url,
           data: $("#itable").serialize(), // serializes the form's elements.
           success: function(data)
           {
			alert('Saved');
           }
         });


}
   
});
</script>
	  
	  
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="logout.php" id="logout" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
