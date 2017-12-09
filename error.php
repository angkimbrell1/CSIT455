<?php
	$page = "error";
	require "session.php";
	require "header.php";
?>

<body id=firstpage>
  <div class="container">
  	<div class="row">
  		<div class="col-md-6 col-md-offset-3">
  			<div class="panel">
  				<div class="panel-heading">
  					<label class="col-md-12 alert alert-info"><?php echo $_SESSION['errorMessage'] ?></label>
  				</div>
  				<div class="panel-body">
	  				<a href="login.php" class="col-md-6">Try Logging in Again</a>
	 				<a href="register.php" class="col-md-6">Register</a>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
</body>
</html>
