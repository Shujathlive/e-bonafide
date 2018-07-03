<?php  echo '<nav class="cyan">
	<div class="nav-wrapper">
    <a href="#!" class="brand-logo center">e-Bonafide</a>
    <ul class="right ">
		
      <li class="hide-on-med-and-down">'; 
	  $uname=$_SESSION['uname'];
	  echo "Welcome, ".$uname;
	  echo '</li>  
      <!-- Dropdown Trigger -->
      <li class="right show-on-med-and-down"><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons right">menu</i></a></li>
	  
    </ul>
  </div>
	  </nav>
	  <ul id="dropdown1" class="dropdown-content">
		  
		  <br>
		  <label><h6 class="center">Campus</h6></label>
		  
		  <li><a href="create_student.php">Create Student</a></li>
		  <li class="divider"></li>
		  <li><a href="create_header.php">Create Header</a></li>
		  <li><a href="view_header.php">View Header</a></li>
		  <li class="divider"></li>
		  <li><a href="changepassword.php">Change Password</a></li>
		</ul>';
?>