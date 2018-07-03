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

		
	<?php include('menuadmin.php') ?>
	  
	  <form>
	  <div class="container">
		<br>
		<h4>Admin | Dashboard</h4>
		<hr>
		
		<br>
	<div class="row">
  <div class="card small red lighten-4 col m4 s12">

    <div class="card-content ">
      <span class="card-title activator grey-text text-darken-4">Instituitions<i class="material-icons right">more_vert</i></span>
      <br><h5>  <?php 
			//$fac = sprintf("SELECT COUNT(DISTINCT staffid) FROM overallfaculty");
			// Perform Query
			//$result =mysqli_query($conn,$fac);
			//$rows = mysqli_fetch_array($result);
			echo "Total Count ".$rows[0];
			 ?></h5>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
      <p><?php
			  $stu= sprintf("SELECT  staffid,firstname FROM overallfaculty");
// Perform Query
//echo $fac;
$res =mysqli_query($conn,$stu);

echo "<table class='highlight responsive-table'><thead><tr><th>Staff ID</th><th>Faculty Name</th></tr></thead><tbody>";
while($row = mysqli_fetch_array($res)){
echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
}
echo "</tbody></table>";

?></p>
    </div>
  </div>
  
  <div class="card small yellow lighten-4 col m4 s12 ">

    <div class="card-content ">
      <span class="card-title activator grey-text text-darken-4">Campuses<i class="material-icons right">more_vert</i></span>
                 <br><h5><?php
			  $course= sprintf("SELECT COUNT(DISTINCT courseid) FROM course");
// Perform Query
//echo $fac;
//$r =mysqli_query($conn,$course);
//$q = mysqli_fetch_array($r);
echo "Total Count ".$q[0];

?>
</h5>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
      <p><?php
			  $stu= sprintf("SELECT  courseid,coursename FROM course");
// Perform Query
//echo $fac;
//$res =mysqli_query($conn,$stu);

echo "<table class='highlight responsive-table'><thead><tr><th>Student ID</th><th>Student Name</th></tr></thead><tbody>";
//while($row = mysqli_fetch_array($res)){
//echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
//}
echo "</tbody></table>";

?></p>
    </div>
  </div>
  <div class="card small green lighten-4 col m4 s12 ">

    <div class="card-content ">
      <span class="card-title activator grey-text text-darken-4">Students<i class="material-icons right">more_vert</i></span>
                   <br><h5><?php
	//		  $stu= sprintf("SELECT COUNT(DISTINCT studentid) FROM overallstudent");
// Perform Query
//echo $fac;
//$res =mysqli_query($conn,$stu);
//$row = mysqli_fetch_array($res);
echo "Total Count ".$row[0];

?></h5>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Students<i class="material-icons right">close</i></span>
      <p><?php
			 // $stu= sprintf("SELECT  studentid,firstname FROM overallstudent");
// Perform Query
//echo $fac;
//$res =mysqli_query($conn,$stu);

echo "<table class='highlight responsive-table'><thead><tr><th>Student ID</th><th>Student Name</th></tr></thead><tbody>";
//while($row = mysqli_fetch_array($res)){
//echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";}
//echo "</tbody></table>";

?></p>
    </div>
  </div>
  </div>
</div>
</form>
  </main>
  <main>
<main>
	<div class="container">
	  <form></form>
	  <center>
	  
	  <div class="row">
			<a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>button</a>
			<h6> | </h6>
			<a class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>button</a>
      
	  </div>
	  </center>
	  
	  
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

    </script>
	<script type="text/javascript" src="bonafide.js"></script>
    
	
	  
	  
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="../logout.php" id="download" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
