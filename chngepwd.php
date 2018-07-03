 <?php
require_once 'dbconfig.php';
session_start();
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
		
	  <form method="POST" action="changepwd.php">
	  <div class="container">
		<br>
		<br>
		    <h5 class="left">Change Password</h5>
			
			<br>
			<br>
				<div class="container">
				  <div class="row">
					<div class="input-field inline">
					  <input id="oldpwd" name="oldpwd" type="password" class="validate" required>
					  <label for="olpwd">Old Password</label>
					</div>
				  </div>
				  <div class="row">
					<div class="input-field inline">
					  <input id="newpwd" name="newpwd" type="password" class="validate" required>
					  <label for="newpwd">New Password</label>
					</div>
				  </div>
				  <div class="row">
					<div class="input-field inline">
					  <input id="rpwd" name="rpwd" type="password" class="validate" required>
					  <label for="rpwd">Confirm Password</label>
					</div>
				  </div>

				  <center>	
					<button class="waves-effect waves-light btn green" id="submit" name="submit">Submit</button>
				  </center>

			  </div>
	  	  </div>
		  </form>
 </div>    	 

	 
	  <!--Import jQuery before materialize.js-->

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	  <!-- Compiled and minified JavaScript -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
	 
	  
	 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
  
	
	

    
	
	  
	  
    </main>
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="logout.php" id="download" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>