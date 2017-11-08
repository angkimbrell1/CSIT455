<?php


      $employeeIDKey = $_POST["employeeID"];
      $password = $_POST["password"];

      if($employeeIDKey[0] == 'M' || $employeeIDKey[0] == 'm')
      {
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

      //Check vars, if good, redirect to profile
      // If bad, redirect to Login
      if($foundID && $foundPassword == $password) {
        header("Location: homepage.php?managerID=".$foundID);
      } else {
        header("Location: 404.php");
      }
      }
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

    //Check vars, if good, redirect to profile
    // If bad, redirect to Login
    if($foundID && $foundPassword == $password) {
      header("Location: homepage.php?employeeID=".$foundID);
    } else {
      header("Location: 404.php");
    }
?>
