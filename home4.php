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
	   <!-- cctcrequest -->	
	  <div class="container">
		<center>	
	  <form>
	  		
	  <div class="container">
		<br>
		<br>
		<br>
		<button class="waves-effect waves-light btn green" id="download"  onclick="clicked('TC')" >REQUEST</button>
		</div>
	  </form>
	  
	
				
				<br>
	  <!-- STATUS CARD -->				
		<div class="row">
      
          <div class="card">
            <div class="card-content">
              <span class="card-title">Transfer Certificate</span>
			  <table class="center">
        <thead>
          <tr>
	          <th>Date & Time</th>
              <th>Certificate ID</th>
              <th>Status</th>
          </tr>
        </thead>

        <tbody>
		<?php
		$regNo=$_SESSION['uname'];
		$stable = $_SESSION['stable'];
$sql1="SELECT instituteId,campusId FROM $stable where RegNo='$regNo'";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_row($res1);
$iID=$row1[0];
$cID=$row1[1];
$ctable='campus_'.$iID.$cID;
 $sql="SELECT certificateNo,activate,created_at FROM $ctable WHERE regNo='$regNo' AND certificate='TC'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_row($res)){
	echo '<tr>';
	echo '<td>'.$row[2].'</td>';
	echo '<td>'.$row[0].'</td>';
	if($row[1]=='0'){
	echo '<td><p class=" yellow-text">PENDING</p></td>';	
	}
	else if($row[1]=='1'){
	echo  '<td><p class=" green-text">ACCEPTED</p></td>';	
	}
	else {
	echo  '<td><p class=" red-text">REJECTED</p></td>';	
	}
	
	echo '</tr>';
}
 ?>
         
        </tbody>
      </table>
            
            </div>
            
          </div>
        </div>
		
						</center>
 </div>    	 
<!-- cctcrequest -->	
	 
	  <!--Import jQuery before materialize.js-->

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	  <!-- Compiled and minified JavaScript -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
	 
	  
	 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
  
	
	
	<script type="text/javascript">
	/*$.ajax({
            type:"POST",
            url:"process4.php",
            dataType: "json" ,
            success:function(data){
               buildPDF(data);		
				},
				error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            }
        });
	function clicked(x) {
		doc.save('bonafide.pdf');
	//location.reload(true);
	} cctcrequest.php*/
	///////////////////////////////////cctcrequest////////////////////////////
		function clicked(x) {
		$.ajax({
            type:"POST",
            url:"cctcrequest.php",
            data:{
				cert: x	
			},
            success:function(data){
               Materialize.toast('Request sent!', 4000);		
				},
				error: function (data) {
                alert('An error occurred.');
                console.log(data);
            }
        });
	location.reload(true);
	} 
	   //////////////////////////////////////////cctcrequest///////////////////////
    </script>
	<script type="text/javascript" src="ebonafide-tc.js"></script>
    
	
	  
	  
    </main>
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="logout.php" id="download" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
