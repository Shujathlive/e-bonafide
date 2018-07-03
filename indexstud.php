<!doctype html>
<?php
session_start();
require_once 'dbconfig.php';
?>
	
<html>
  <header>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>e-Bonafide</title>
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>
	
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

 <nav>
    <div class="nav-wrapper cyan">
      <a href="#" class="brand-logo center">e-Bonafide</a>
    
    </div>
  </nav>
        
  <br>
  <br>
  		<div class="container">  
		<div class="row">
<br>
<br>
<br>
<br>

			<div class="col s12 m4">
			  <div class="card hoverable red accent-3">
				<div class="card-content white-text">
				 <center> <span class="card-title">BONAFIDE CERTIFICATE</span> </center>
				</div>
				<div class="card-action disabled" >
			 <center><a class="waves-effect waves-light btn blue accent-3 modal-trigger" id="mcq" href="home1.php" >OPEN</a>
				   </center>
				   
				</div>
			  </div>

			</div>
				
			<div class="col s12 m4">
			  <div class="card hoverable red accent-3">
				<div class="card-content white-text">
				 <center> <span class="card-title">FEES ESTIMATION</span></center>
				</div>
				<div class="card-action disabled" >
				 <center><a class="waves-effect waves-light btn blue accent-3 modal-trigger" id="mcq" href="home2.php" >OPEN</a>
				   </center>
				</div>
			  </div>
		
			</div>
			<div class="col s12 m4">
			  <div class="card hoverable red accent-3">
				<div class="card-content white-text">
				  <center><span class="card-title">FEES PAID</span></center>
				</div>
				<div class="card-action disabled" >
				   <center><a class="waves-effect waves-light btn blue accent-3 modal-trigger" id="mcq" href="home3.php" >OPEN</a>
				   </center>
				</div>
			  </div>
				
			</div>
			<!----------------- cctcactivate ---------------------------->
			<?php
					$username=$_SESSION['uname']; 	
					$stable = $_SESSION['stable'];
					//campusId
					$sql1="SELECT campusId FROM $stable where RegNo='$username' ";
					$res1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_row($res1);
					$cID = $row1[0];
					
					$sql="SELECT cctcactivate FROM campus where campusId='1' ";
					$res=mysqli_query($conn,$sql);
					$row=mysqli_fetch_row($res);
					if($row[0]){
						echo '<div class="col s12 m4">
			  <div class="card hoverable red accent-3">
				<div class="card-content white-text">
				  <center><span class="card-title">TC</span></center>
				</div>
				<div class="card-action disabled" >
				   <center><a class="waves-effect waves-light btn blue accent-3 modal-trigger" id="mcq" href="home4.php" >OPEN</a>
				   </center>
				</div>
			  </div>
				
			</div>
			<div class="col s12 m4">
			  <div class="card hoverable red accent-3">
				<div class="card-content white-text">
				  <center><span class="card-title">CC</span></center>
				</div>
				<div class="card-action disabled" >
				   <center><a class="waves-effect waves-light btn blue accent-3 modal-trigger" id="mcq" href="home5.php" >OPEN</a>
				   </center>
				</div>
			  </div>
				
			</div>
			';
					}
					
				?>
			<!----------------- cctcactivate ---------------------------->
		  

</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script>

    <script src="js/js/index.js"></script>

</main>
	 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="logout.php" id="logout" name="logout">Log Out</a></center>
			<br>
	</footer>
</html>