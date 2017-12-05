<?php
require "session.php";
  require "reg_functions.php";

  $employeeIDKey = $_POST["employeeID"];
  $password = $_POST["password"];

  if($employeeIDKey[0] == 'M' || $employeeIDKey[0] == 'm') {
    //set the table and ID type
    $table = "managers";
    $empIDType = "managerID";
    //Connect to DB
    include ("db.php");
    $connection = DB::CreateConnection();

    // Prepare
    $sql = $connection->prepare("SELECT managerID, password FROM managers WHERE managerID = ?");

    //BIND
    $sql->bind_param("s", $employeeIDKey);
    $sql->execute();
    $sql->bind_result($foundID, $foundPassword);
    $sql->fetch();

    $sql->close();
    //Check vars, if good, redirect to profile
    // If bad, redirect to Login
    if(!EmployeeIDExists($table, $empIDType, $employeeIDKey, $connection)) {
      $_SESSION['errorMessage'] = "EmployeeID does not exist";
      header("Location: error.php");
      exit();
    }

    if(password_verify($password, $foundPassword)) {
      //assign id for session
      $_SESSION['userID'] = $foundID;
      header("Location: homepageManager.php?managerID=".$foundID);

    } else {
      $_SESSION['errorMessage'] = "Incorrect Password";
      header("Location: error.php");
    }
  }

  $table = "employees";
  $empIDType = "employeeID";

  //Connect to DB
  include ("db.php");
  $connection = DB::CreateConnection();

  // Prepare
  $sql = $connection->prepare("SELECT employeeID, password FROM employees WHERE employeeID = ?");

  //BIND
  $sql->bind_param("s", $employeeIDKey);
  $sql->execute();
  $sql->bind_result($foundID, $foundPassword);
  $sql->fetch();

  $sql->close();

  //Check vars, if good, redirect to profile
  // If bad, redirect to Login
  if(!EmployeeIDExists($table, $empIDType, $employeeIDKey, $connection)) {
    $_SESSION['errorMessage'] = "EmployeeID does not exist";
    header("Location: error.php");
    exit();
  }

  if(password_verify($password, $foundPassword)) {
    $_SESSION['userID'] = $foundID;
    header("Location: homepage.php?employeeID=".$foundID);

  } else {
    $_SESSION['errorMessage'] = "Incorrect Password";
    header("Location: error.php");
  }

?>
