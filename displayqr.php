<!doctype html>
<?php
//session_start();
require_once 'dbconfig.php';
$certificate = $_GET['cno'];

$regNo = explode('/',$certificate);
$reg = $regNo[0];
$icID = $regNo[1];

$stable = 'student_'.$icID;
$sql="SELECT  `StudentName`, `DOB`, `RegNo`, `Sex`, `Branch`, `YearofStudying`, `Academic Year`, `Program`, `DurationOfCourse` FROM `$stable` WHERE RegNo='$reg'";

$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);


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
  		<div class="container pushpin">  

		  <div class="row">
					<div class="input-field inline">
					  <input id="name" name="name" type="text" value="<?php echo $row[0] ?>" class="validate" readonly>
					  <label for="oldpwd">Name</label>
					</div>
				  </div>
		  <div class="row">
					<div class="input-field inline">
					  <input id="dob" name="dob" type="text" value="<?php echo $row[1] ?>" class="validate" readonly>
					  <label for="oldpwd">DOB</label>
					</div>
				  </div>
		  <div class="row">
					<div class="input-field inline">
					  <input id="reg" name="reg" type="text" value="<?php echo $row[2] ?>" class="validate" readonly>
					  <label for="oldpwd">Registration No.</label>
					</div>
				  </div>
		  <div class="row">
					<div class="input-field inline">
					  <input id="sex" name="sex" type="text" value="<?php echo $row[3] ?>" class="validate" readonly>
					  <label for="oldpwd">Sex</label>
					</div>
				  </div>
		  <div class="row">
					<div class="input-field inline">
					  <input id="branch" name="branch" type="text" value="<?php echo $row[4] ?>" class="validate" readonly>
					  <label for="oldpwd">Branch</label>
					</div>
				  </div>
		  <div class="row">
					<div class="input-field inline">
					  <input id="yos" name="yos" type="text" value="<?php echo $row[5] ?>" class="validate" readonly>
					  <label for="oldpwd">Year of Studying</label>
					</div>
				  </div>
		  <div class="row">
					<div class="input-field inline">
					  <input id="ay" name="ay" type="text" value="<?php echo $row[6] ?>" class="validate" readonly>
					  <label for="oldpwd">Academic Year</label>
					</div>
				  </div>
		  <div class="row">
					<div class="input-field inline">
					  <input id="pgm" name="pgm" type="text" value="<?php echo $row[7] ?>" class="validate" readonly>
					  <label for="oldpwd">Program</label>
					</div>
				  </div>
		  <div class="row">
					<div class="input-field inline">
					  <input id="dos" name="dos" type="text" value="<?php echo $row[8] ?>" class="validate" readonly>
					  <label for="oldpwd">Duration of Course</label>
					</div>
				  </div>
		
		</div>
		</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script>

    <script src="js/js/index.js"></script>

</main>
	 <footer class="page-footer cyan">
			<center class="card"><h5>SRM University</h5></center>
			<br>
	</footer>
</html>