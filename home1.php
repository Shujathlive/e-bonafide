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

		
	  <nav class="cyan">
		<div class="nav-wrapper">
		  <a href="#" class="brand-logo center">e-Bonafide</a>
		  <ul id="nav-mobile" class="hide-on-small-only right">
			  Welcome, <?php
			  $uname=$_SESSION['uname']; 
			  echo $uname;?>
		  </ul>
	
		</div>
	  </nav>
	  <div class="container">
		
	  <form>
	  <div class="container">
		<br>
		<br>
		<br>
		    <div class="row center">
			<label><h5>Purpose</h5>&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<br>
			<?php
		$sql="SELECT purposeName,purposeId FROM purpose";
		$res=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_row($res)){
			echo'&nbsp;&nbsp;&nbsp;<input class="with-gap col s6" name="optradio" type="radio" id="'.$row[1].'" value="'.$row[0].'"/>';
			echo '<label for="'.$row[1].'">'.$row[0].'</label>';
		}
		?>
			
			
				
				
	
			</div>
		
			
		
	  </div>
	  </form>
	  <center>	
	
				<button class="waves-effect waves-light btn green" id="download" name="download" onclick="clicked()">Download</button>
						</center>
 </div>    	 

	 
	  <!--Import jQuery before materialize.js-->

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	  <!-- Compiled and minified JavaScript -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
	 
	  
	 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
  
	
	
	<script type="text/javascript">
	function clicked() {
	doc.save('bonafide.pdf');
	location.reload(true);
	}   
    </script>
	<script type="text/javascript" src="bonafide.js"></script>
    
	
	  
	  
    </main>
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="logout.php" id="download" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
