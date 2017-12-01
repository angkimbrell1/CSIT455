<?php
	
	require "session.php";
	require "db.php";
	require "reg_functions.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_POST['password']) || 
		empty($_POST['confirm-password']) || 
		empty($_POST['employeeID']))) {

		$_SESSION['errorMessage'] = "All fields need to be filled out";
		header("Location: error.php");

	} else {

		$password = $_POST['password'];
		$confirmPassword = $_POST['confirm-password'];
		$employeeID = $_POST['employeeID'];

		$connection = DB::CreateConnection();

		if (ucfirst($employeeID[0]) === "M") {
			$table = "managers";
			$empIDType = "managerID";

			if(!EmployeeIDExists($table, $empIDType, $employeeID, $connection)) {
				$_SESSION['errorMessage'] = "Employee ID not found";
				header("Location: error.php");
				exit();
			}
			//check if a password already exists
			if (PasswordExists($table, $empIDType, $employeeID, $connection)) {
				$_SESSION['errorMessage'] = "Password already exists";
				header("Location: error.php");
				exit();

			//password and confirm-password must match
			} elseif ($password != $confirmPassword) {
				$_SESSION['errorMessage'] = "Password must match both times";
				header("Location: error.php");
				exit();

			//set new password in DB
			} else {	
				UpdatePassword($table, $empIDType, $employeeID, $password, $connection);
				header("Location: login.php");
				exit();
			}

		} elseif (ucfirst($employeeID[0]) === "E") {
			$table = "employees";
			$empIDType = "employeeID";

			if(!EmployeeIDExists($table, $empIDType, $employeeID, $connection)) {
				$_SESSION['errorMessage'] = "Employee ID not found";
				exit();
			}
			//check if a password already exists to
			//prevent someone from changing an employee's password
			if (PasswordExists($table, $empIDType, $employeeID, $connection)) {
				$_SESSION['errorMessage'] = "Password already exists";
				header("Location: error.php");
				exit();

			//password and confirm password must match
			} elseif ($password != $confirmPassword) {
				$_SESSION['errorMessage'] = "Password must match both times";
				header("Location: error.php");
				exit();

			} elseif (!PasswordMatch($table, $password, $connection)){		
				//set employee password to new password
				UpdatePassword($table, $empIDType, $employeeID, $password, $connection);
				header("Location: login.php");
				exit();
			}		

		} else {
			//die ("You need to be registered before you can create a password");
			//header("Location: login.php");
			$_SESSION['errorMessage'] = "You must be registered by a manager first";
			header("Location: homepage.php");
			exit();
		}
	}

?>
