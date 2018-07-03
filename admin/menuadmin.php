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

		  <li class="divider"></li>

		  <label><h6 class="center">Instituition</h6></label>
		  
		  <li><a href="create_institute.php">Create User</a></li>
		  <li><a href="manage_institute.php">Manage User</a></li>
		  <li class="divider"></li>	  
		  		  <li><a href="add_purpose.php">Add Purpose</a></li>
		  <li><a href="manage_purpose.php">Manage Purpose</a></li>
		  <li class="divider"></li>

		  <li><a href="changepassword.php">Change Password</a></li>
		</ul>';
?>