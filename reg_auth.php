<?php 
	include "db.php";
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

			if(!EmployeeIDExists($table, $empIDType, $employeeID, $connection)) {
				RegisterEmployee($employeeID, $firstName, $lastName, $storeID, $email, $table, $connection);
				header("Location: pwRegister.php");
				exit();

			} else {
				echo "error: " . $connection->error;
				exit();
			}
			//email link to password registration page
			//PwRegLink($email);

		//employee registration
		} elseif (ucfirst($employeeID[0] === "E")) {

			$table = "employees";
			$empIDType = "employeeID";

			if(!EmployeeIDExists($table, $empIDType, $employeeID, $connection)) {

				RegisterEmployee($employeeID, $firstName, $lastName, $storeID, $email, $table, $connection);
			} else {
				echo "error: " . $connection->error;
			}

			//email link to password registration page
			//PwRegLink($email);
		}


		$connection->close();
	} else {
		//die("Only a manager can register employees");
		header("Location: login.php");
	}

	//Insert employee information from Registration form into database
	function RegisterEmployee ($empID, $first, $last, $storeID, $email, $table, $conn) {

			//prepare
			if($sql = $conn->prepare("INSERT INTO ".$table."(employeeID, firstName, lastName, storeID, email)) 
				VALUES(?,?,?,?,?);")) {
				//Bind
				$sql->bind_param("sssss", $employeeID, $firstName, $lastName, $storeID, $email);
				//Execute
				$sql->execute();
				$sql->close();
			} else {
				$sql->close();
				echo "error: " . $conn->error;
			}
	}

	//Checks to see if Employee ID already exists in DB
	//Returns a Boolean value (true if ID exists, false if not)
	function EmployeeIDExists($table, $empIDType, $empID, $conn) {

		if($sql = $conn->prepare("SELECT ".$empIDType." FROM ".$table." WHERE ".$empIDType." = ?;")){
			$sql->bind_param("s", $empID);
			$sql->execute();
			$result = $sql->fetch();
			//close statement
			$sql->close();
			return $result;
		} else {
			$sql->close();
			echo "error: " . $conn->error;
		}
	}
	//emails a link to the employee, directing them to the password registration form
	//-might require configuration of a local mail server which would be a horrible 
	//-pain in the ass
	//not sure if this is acutally a good idea
	function PwRegLink ($email) {
		$message = 
		'<!DOCTYPE html>
		<html>
		<head>

		</head>
		<body>
			<div>
				<p>Just one more step to complete your registration</p>
			</div>
			<div>
				<a href="#/pwRegister.php">Create Your Password</a>
			</div>
		</body>
		</html>';
		$headers[] = "MIME-Version: 1.0" . "\r\n";
		$headers[] = "Content Type: text/html" . "\r\n";
		mail($email, "Password Registration", $message);

	}

?>