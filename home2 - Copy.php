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
			  Welcome, <?php $uname=$_SESSION['uname']; echo $uname;?>
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
			&nbsp;&nbsp;&nbsp;<input class="with-gap col s6" name="optradio" type="radio" id="1" value="Scholarship"/><label for="1">Scholarship</label>&nbsp;&nbsp;&nbsp;<input class="with-gap col s6" name="optradio" type="radio" id="2" value="Passport"/><label for="2">Passport</label>&nbsp;&nbsp;&nbsp;<input class="with-gap col s6" name="optradio" type="radio" id="3" value="Education Loan"/><label for="3">Education Loan</label>&nbsp;&nbsp;&nbsp;<input class="with-gap col s6" name="optradio" type="radio" id="4" value="VISA"/><label for="4">VISA</label>&nbsp;&nbsp;&nbsp;<input class="with-gap col s6" name="optradio" type="radio" id="5" value="Fees"/><label for="5">Fees</label>
			<input id="amount" name="amount" type="text" class="validate"  required>
          <label for="amount" >Enter Amount</label>
			
				
				
	
			</div>
		
			
		
	  </div>
	  </form>
	  
	  <!-- STATUS CARD -->				
		<div class="row">
      
          <div class="card">
            <div class="card-content">
              <span class="card-title">REPORT</span>
			  <table class="center">
        <thead>
          <tr>
              <th>Date & Time</th>
              <th>Purpose</th>
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
$actable='accounts_'.$iID.$cID;
 $sql="SELECT certificateNo,regNo,purpose,FLAG,created_at FROM $actable WHERE regNo='$regNo'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_row($res)){
	echo '<tr>';
	echo '<td>'.$row[4].'</td>';
	echo '<td>'.$row[2].'</td>';
	echo '<td>'.$row[0].'</td>';
	if($row[3]=='0'){
	echo '<td><p class=" yellow-text">PENDING</p></td>';	
	}
	else if($row[3]=='1'){
	echo  '<td><p class=" green-text">SUCCESS</p></td>';	
	}
	else {
	echo  '<td><p class=" red-text">FAILED</p></td>';	
	}
	
	echo '</tr>';
}
 ?>
         
        </tbody>
      </table>
            
            </div>
            
          </div>
        </div>
      </div>
		<!-- STATUS CARD -->	
	  
	  
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
		var purpose = '';

	purpose = $( 'input[name=optradio]:checked' ).val();
	amount = $( '#amount' ).val();	
 $.ajax({
            type:"POST",
            url:"process2.php",
            data:{
				pup:purpose,
				amt:amount
			},
			dataType: "json" ,
            success:function(data){
               buildPDF(data);		
			 doc.save('bonafide.pdf');
				console.log(data);
				},
				error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            }
        });	


	//location.reload(true);
	}    

    </script>

	   <script type="text/javascript" src="bonafide2.js"></script>
	  
    </main>
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="logout.php" id="download" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
