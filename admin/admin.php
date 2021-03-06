 <?php
session_start();
require_once 'dbconfig.php';

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success fade in';
            $statusMsg = 'User data has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger fade in';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger fade in';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}
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
		
	  <form>
	  <div class="container">
		<br>
		<br>
		<br>
		    <div class="row center">
						
				  <form action="CSVupload.php" method="POST" enctype="multipart/form-data">
					<div class="file-field input-field">
					  <div class="btn">
						<span>File</span>
						<input type="file" id="file" name="file">
					  </div>
					  <div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload one or more files">
					  </div>
					</div>
				  </form>
			</div>
		
			<center>	
	
				<button class="waves-effect waves-light btn green" type="submit" id="upload" name="importSubmit">Upload</button>
							<a class="waves-effect waves-light btn btn-floating  pulse blue btn tooltipped" data-position="right" data-delay="50" data-tooltip="Sample CSV file" href="../CSV/members.csv"><i class="material-icons" download>live_help</i></a></center>
		
	  </div>
	  </form>
 </div>    	 

	 
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
    </main>
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="../logout.php" id="download" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
