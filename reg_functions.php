<?php

	//Insert employee information from Registration form into database
	function RegisterEmployee ($empID, $first, $last, $storeID, $email, $table, $conn, $empIDType) {
			//prepare
			$sql = $conn->prepare("INSERT INTO ".$table." (".$empIDType.", firstName, lastName, storeID, email) VALUES (?,?,?,?,?);");
				if($sql == false)
				{
					echo "SQL is false! You shall not pass!";
				}
				//Bind
				$sql->bind_param("sssss", $empID, $first, $last, $storeID, $email);
				//Execute
				$sql->execute();
				$sql->close();

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

	//Returns true if a password exists, false otherwise
	// function PasswordExists($table, $empIDType, $empID, $conn) {
	// 	$sql = $conn->query("SELECT password FROM managers WHERE managerID like '%$empID%'");
	// 	$password = $sql->fetch_assoc();
	// 	return $password;
	// 	//close the statement
	// 	// if ($sql->fetch()) {
	// 	// 	$sql->close();
	// 	// 	return true;
	// 	// } else {
	// 	// 	$sql->close();
	// 	// 	return false;
	// 	// }
	// }

	//set user password in db
	function UpdatePassword($table, $empIDType, $empID, $pw, $conn) {
		$hashed_pw = password_hash($pw,PASSWORD_DEFAULT);
		$sql = $conn->prepare("UPDATE ".$table." SET password=? WHERE ".$empIDType."=?;");
		$sql->bind_param("ss", $hashed_pw, $empID);

		if($sql->execute()) {
			$sql->close();
			return true;
		} else {
			$sql->close();
			return false;
		}

	}

	//check user password against all passwords in db to prevent doubles
	function PasswordMatch($table, $pw, $conn) {
		$sql = $conn->prepare("SELECT password FROM ".$table.";");
		$sql->bind_param("s", $pass);
		$sql->execute();
		$sql->bind_result($pw);

		//if password_verify() returns true for the user password and the hashed
		//db password then the user password is already taken
		while ($result = $sql->fetch()) {
			if (password_verify($pw, $pass)) {
				$sql->close();
				return true;
			}
		}
		$sql->close();
		return false;
	}

	?>
