  <!DOCTYPE html>
  <?php
require('dbconfig.php');
session_start();
?>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
	<div class="container" >
		<form action="login.php" method="POST">
			
  <div class="row"  style="padding-top:10%;padding-left:10%;">
    <div class="col s12 m12">
      <div class="card col m6 s12 offset-m2  hoverable" ><br>
          <center><div class="card cyan accent-4"><span class="card-title white"><div style="font-size:larger;color:white;">e-Bonafide</div><div style="font-size:large;color:white">SRM UNIVERSITY</div></span></div></center>
         
        
        <div class="card-content">
             <div class="row">
				<div class="input-field col s12">
				  <input id="user" name="username" type="text" class="validate">
				  <label for="uname">Username</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
				  <input id="pass" name="password" type="password" class="validate">
				  <label for="pass">Password</label>
				</div>
			</div>
							<center>		
			<button type="submit" name="submit" class="waves-effect waves-light btn cyan darken-1" >Submit</button>
			
		</center>
        </div>
		<center >
 <div class="card cyan accent-4" style="color:white;font-size:medium;">
   <span style="    position: relative;
    
    display:inline-block;
    transform: rotate(180deg);">&nbsp;&nbsp;&copy;</span>Copyleft, SRM UNIVERSITY</div>  </center>
<br>    
	</div>
	
    </div>
  </div>

		</form>
	</div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
          
    </body>
  </html>