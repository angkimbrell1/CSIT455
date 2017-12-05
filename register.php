<?php $page = "Register";

require "header.php"; ?>

  <body id=firstpage>
    <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="login.php" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="register.php" class="active" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="register-form" action="reg_auth.php" method="post" role="form" style="display: block;">

                  					<!--Are employees assigned an ID by the DB or before they are registered??-->

                  					<div class="form-group">
										<input type="text" name="employeeID" id="employeeID" tabindex="1" class="form-control" placeholder="Employee ID" value="">
									</div>

									<!--Added firstName and lastName to register form-->
									<div class="form-group">
				                   		<input type="text" name="firstName" id="firstName" tabindex="1" class="form-control" placeholder="First Name" value="">
				                    </div>

				                    <div class="form-group">
				                   		<input type="text" name="lastName" id="lastName" tabindex="1" class="form-control" placeholder="Last Name" value="">
				                    </div>

				                    <div class="form-group">
				                   		<input type="text" name="storeID" id="storeID" tabindex="1" class="form-control" placeholder="Store ID" value="">
				                    </div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
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
