<?php 
$page = "Password Confirmation"; 
require "db.php"; 

require "header.php";

?>

<body id="firstpage">
    <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<label>Create Your Password</label>
					</div>
					<div class="panel-body">
						<div class="row">
							<div>
								<form id="register-form" action="pw_auth.php" method="post" novalidate>
									<div class="form-group">
										<input type="text" id="employeeID" name="employeeID" placeholder="Employee ID" class="form-control" tabindex="1" required>
									</div>
									<div class="form-group">
										<input type="password" id="password" name="password" placeholder="Password" class="form-control" tabindex="1" required>
									</div>								
									<div class="form-group">
										<input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control" tabindex="1" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
