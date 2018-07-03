 <?php
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

		
	  <nav class="cyan">
	<div class="nav-wrapper">
    <a href="#!" class="brand-logo center">e-Bonafide</a>
    <ul class="right ">
		
      <li class="hide-on-med-and-down"><?php echo "Welcome, ".$_SESSION['uname'];?></li>  
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
			  
	  <form>
	  <div class="container">
		<br>
		<h4>Admin | Manage Purpose</h4>
		<hr>
		
		<br>
	
	  	<div class="conatiner">
		<form class="center">
	
	   <table class="striped responsive-table">
        <thead>
          <tr>
              <th>Purpose Name</th>
              <th>Purpose ID</th>
              
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            
          </tr>
        </tbody>
      </table>
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
	
	
	<script type="text/javascript">
	
	function clicked() {
	doc.save('bonafide.pdf',true	);
	location.reload(true);
	}    
	function preview(){
	 preview_container = document.getElementById('previewframe');
	 preview_container.attr('src', doc.output('datauristring'));
	 }

  $(document).ready(function(){
    $('ul.tabs').tabs();
  });
        
    </script>
	<script type="text/javascript" src="bonafide.js"></script>
    
	
	  
	  
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="logout.php" id="logout" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
