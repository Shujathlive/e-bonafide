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
		<br>
		<h4>Admin | Create Purpose</h4>
		<hr>
		
		<br>
		
		<div class="conatiner">
		 <br>
		 <div class="row">
			 <table class="col s6 striped responsive-table">
        <thead>
          <tr>
              <th>Purpose Name</th>
              <th>Purpose ID</th>
          
          </tr>
        </thead>

        <tbody>
		<?php
		$sql="SELECT purposeName,purposeId FROM purpose";
		$res=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_row($res)){
			echo" <tr><td>";
			echo $row[0];
			echo "</td><td>";
			echo $row[1];
			echo"</td></tr>";
		}
		?>
         <div class="row">
    <form id="add_p" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input id="p_name" name="p_name" type="text" class="validate">
          <label for="p_name">Purpose Name</label>
        </div>
		
        <div class="input-field col s6">
       <button class="waves-effect waves-light btn green" id="submit" type="submit" >Submit</button> 
        </div>
	</div>
	</form>
  </div>
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script>
// this is the id of the form
$("#add_p").submit(function(e) {

    var url = "add_p.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#add_p").serialize(), // serializes the form's elements.
           success: function(data)
           {
               console.log(data); // show response from the php script.
           }
         });

   
});
</script>
	
	
	
	  
	  
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="../logout.php" id="logout" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
