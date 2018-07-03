 <?php
session_start();
//load the database configuration file
include 'dbconfig.php';

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
	 <!-- cctcactivate----------------------- -->	
	<div class="container">
		
	  <form>
	  
		<br>
		<br>
		<br>
	<h4>Manage Final Year Certificates</h4>	   
  <div class="row">
  
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s6"><a class="active" href="#test1">ACCEPTANCE</a></li>
        <li class="tab col s6"><a  href="#test2">MANAGE</a></li>
        
      </ul>
    </div>
    <div id="test1" class="col s12">
	<div class="left col s8">
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a lorem tincidunt, pharetra neque id, accumsan nisl. Ut mollis vel mi vel sagittis. Maecenas lectus felis, tincidunt id accumsan vitae, dictum nec augue. Ut volutpat iaculis felis at scelerisque. Duis sodales vel magna quis facilisis. Aliquam viverra ligula a semper tristique. Fusce quis tortor nec ipsum varius scelerisque.
	</div>
	<div class="right col s4 center-align">
	
	<br>
	
			   <?php
					$username=$_SESSION['uname']; 	
					$sql1="SELECT cctcactivate FROM campus where campusName='$username' ";
					$res1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_row($res1);
					if($row1[0]){
						echo '<div class = "switch"><label>Off<input type = "checkbox" checked id="toggle" value="1">';
					}
					else{
						echo '<div class = "switch"><label>Off<input type = "checkbox" id="toggle" value="0">';
					}
				?>
                
                  <span class = "lever"></span>On</label></div> 
	</div>
	</div>
    <div id="test2" class="col s12">
	<table class="center">
        <thead>
          <tr>
	          <th></th>
	          <th>Insitute ID</th>
	          <th>Campus ID</th>
	          <th>Register Number</th>
	          <th>Certificate Type</th>
	          <th>Date & Time</th>
              <th>Certificate ID</th>
              <th>Status</th>
          </tr>
        </thead>

        <tbody>
		<?php
		$regNo=$_SESSION['uname'];
$sql1="SELECT instituteId,campusId FROM campus where campusName='$regNo'";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_row($res1);
$iID=$row1[0];
$cID=$row1[1];
$ctable='campus_'.$iID.$cID;
$_SESSION['cctable']=$ctable;
 $sql="SELECT instituteId,campusId,regNo,certificate,certificateNo,activate,created_at FROM $ctable ORDER BY created_at DESC";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_row($res)){
	echo '<tr>';
	echo '<td><p>
      <input name="group1" class="group1" type="radio" id="test1'.$row[4].'" />
      <label for="test1'.$row[4].'"></label>
    </p></td>';
	echo '<td>'.$row[0].'</td>';
	echo '<td>'.$row[1].'</td>';
	echo '<td>'.$row[2].'</td>';
	echo '<td>'.$row[3].'</td>';
	echo '<td>'.$row[6].'</td>';
	echo '<td>'.$row[4].'</td>';
	echo "<td>";
	if($row[5] == 0){
			echo '<button class="btn green waves-effect waves-light accept" type="button" id="accept" name="accept" ><i class="material-icons">check</i>
  </button>&nbsp;&nbsp;&nbsp;<button class="btn red waves-effect waves-light reject" type="button" id="reject" name="reject" ><i class="material-icons">clear</i>
  </button>';}
  else if ($row[5] == 1){
	  echo '<button class="waves-effect waves-light btn green" id="download" name="download" onclick="clicked(1)">Download</button>';
  }
  else{
	  echo '<p class=" red-text">REJECTED</p>';
  }
			echo"</td></tr>";
}
 ?>
         
        </tbody>
      </table>
	
	</div>
  </div>
		   
	  
	  </form>
 </div>   
 		
	  </div>
	      	 

	 
	  <!--Import jQuery before materialize.js-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
		 Materialize.updateTextFields();
		 
/////////////////cctcactivate////////////////////////////////////////////////////////////////		
		var ckbox = $('#toggle');
		var act = '';

    $('#toggle').on('click',function () {
        if (ckbox.is(':checked')) {
            act = 1;
	    } else {
            act =0;
        }
		$.ajax({
            type:"POST",
            url:"activation.php",
            data:{
				act:act
			},
			success:function(data){
				Materialize.toast(data, 4000);
            	},
				error: function (data) {
					Materialize.toast('An error occurred.', 4000);
            }
        });	
		
    });
	$(".accept").click(function(e) {
	var cno = $(this).closest("tr").find("td:eq(6)").text();
	var cert = $(this).closest("tr").find("td:eq(4)").text();
	
	var url = "cctc_stat.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: {
			   cno:cno,
			   cert:cert,
			   stat:1
		   }, // serializes the form's elements.
           success: function(data)
           {	//location.reload();
               Materialize.toast('Status Updated!', 4000);
           }
         });
	});
	$(".reject").click(function(e) {
	var cno = $(this).closest("tr").find("td:eq(6)").text();
	var cert = $(this).closest("tr").find("td:eq(4)").text();
	
	var url = "cctc_stat.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: {
			   cno:cno,
			   cert:cert,
			   stat:2
		   }, // serializes the form's elements.
           success: function(data)
           {	//location.reload();
               Materialize.toast('Status Updated!', 4000);
           }
         });
	});
	
	  
	  });
		$(".group1").click(function(e) {
	var regno = $(this).closest("tr").find("td:eq(3)").text();
	var cert = $(this).closest("tr").find("td:eq(4)").text();
	
	if(cert=="TC"){
		var url = 'process4.php';
	}
	else{
		var url = 'process5.php';
	}
	
	console.log(regno);
	$.ajax({
            type:"POST",
            url:url,
			data:{
				regno:regno,
				cert:cert
			},
            dataType: "json" ,
            success:function(data){
               buildPDF(data);		
				},
				error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            }
        });
	});
	function clicked(x) {
		doc.save('bonafide.pdf');
	//location.reload(true);
	} 
      ///////////////////////cctcactivate////////////////////////////////////////////////////
	
	  </script>
	  <script type="text/javascript" src="ebonafide-tc.js"></script>
    
	  <?php
	  if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Student data has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
	echo"<script>Materialize.toast('$statusMsg', 4000) </script>";
}
	  ?>
	  
    </main>
		 <footer class="page-footer cyan">
			<center><a class="waves-effect waves-light btn light-blue" href="../logout.php" id="download" name="logout">Log Out</a></center>
			<br>
	</footer>
  </html>
