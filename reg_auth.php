<?php 
	include "db.php";
	require "session.php";
	require "reg_functions.php";

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$employeeID = $_POST['employeeID'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$storeID = $_POST['storeID'];
		$email = $_POST['email'];

		$connection = DB::CreateConnection();

		//manager registration
		if (ucfirst($employeeID)[0] === "M") {

			$table = "managers";
			$empIDType = "managerID";

			//make sure employee is not in database already
			if(!EmployeeIDExists($table, $empIDType, $employeeID, $connection)) {
				RegisterEmployee($employeeID, $firstName, $lastName, $storeID, $email, $table, $connection);
				header("Location: pwRegister.php");
				exit();

			} else {
				$_SESSION['errorMessage'] = "Employee already registered";
				header("Location: error.php");
				exit();
			}
			//email link to password registration page
			//PwRegLink($email);

		//employee registration
		} elseif (ucfirst($employeeID[0] === "E")) {

			$table = "employees";
			$empIDType = "employeeID";
			
			//make sure employee is not in database already
			if(!EmployeeIDExists($table, $empIDType, $employeeID, $connection)) {
				RegisterEmployee($employeeID, $firstName, $lastName, $storeID, $email, $table, $connection);
				header("Location: pwRegister.php");
				exit();
				
			} else {
				$_SESSION['errorMessage'] = "Employee already registered";
				header("Location: error.php");
				exit();
			}

			//email link to password registration page
			//PwRegLink($email);
		}


		$connection->close();
	} else {
		//die("Only a manager can register employees");
		header("Location: login.php");
		exit();
	}

?>
