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

	  <div class="container">
		<br>
		<h4>Accounts | Status Check</h4>
		<hr>
		
		<br>
		
		<div class="conatiner">
		 <br>
		  <div class="row">
    <form class="center" id="itable">
      <div class="row">
         <div class="input-field col s6">
          <input id="search" name="search" type="text" class="validate" onkeyup="search(this.value)">
          <label for="search">Search</label>
        </div>
		
	</div>
	</form>
  </div>
		 <div class="row">
		 
			 <table class="col s12 striped responsive-table" id='instData'>
        <thead>
          <tr>
              <th>Instituition ID</th>
              <th>Campus ID</th>
              <th>Register Number</th>
              <th>Purpose</th>
              <th>Certificate Number</th>
              <th>Created At</th>
              <th>Amount</th>
              <th>Status</th>
              
          </tr>
        </thead>

        <tbody>
		<?php
		//accounts
		$uname=$_SESSION['uname'];
		$sql1="SELECT campusId,instituteId FROM accounts where accountsUsername='$uname' ";
		$res1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_row($res1);
		$cID=$row1[0];
		$iID=$row1[1];
		$acctable='accounts_'.$iID.$cID;
		$_SESSION["acctable"] = $acctable;
		$sql="SELECT `instituteId`, `campusId`, `FLAG`, `regNo`, `purpose`, `certificateNo`, `created_at`,`amount` FROM `$acctable` WHERE FLAG='0'";
		$res=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_row($res)){
			echo" <tr><td>";
			echo $row[0];
			echo "</td><td>";
			echo $row[1];
			echo "</td><td>";
			echo $row[3];
			echo "</td><td>";
			echo $row[4];
			echo "</td><td>";
			echo $row[5];
			echo "</td><td>";
			echo $row[6];
			echo "</td><td contenteditable='true'>";
			echo $row[7];
			echo "</td><td>";
			echo '<button class="btn green waves-effect waves-light accept" type="button" id="accept" name="accept" >Accept
  </button>';
			echo"</td></tr>";
		}
		?>
        
        </tbody>
      </table>
			 <table class="col s6 ">
        <tbody>
		
        
		</tbody>
      </table>
	
	    </div>
	
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
    
	
	<script>
	$(".accept").click(function(e) {
	var cno = $(this).closest("tr").find("td:eq(4)").text();
	
	var amt = $(this).closest("tr").find("td:eq(6)").text();
	
	var url = "acc_accept.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: {
			   cno:cno,
			   amt:amt
		   }, // serializes the form's elements.
           success: function(data)
           {	location.reload();
               Materialize.toast('Amount Updated!', 4000);
           }
         });

    
    
})
	</script>
	
	  
	  
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="logout.php" id="logout" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
