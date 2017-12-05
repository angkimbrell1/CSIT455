<?php
  include "db.php";
  $manager_ID = $_POST["managerID"];
  $ID = $_POST["employeeID"];
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $position = $_POST["position"];
  $storeID = $_POST["storeID"];

  DB::addEmployee(
    $_POST["employeeID"],
    $_POST["firstName"],
    $_POST["lastName"],
    $_POST["position"],
    $_POST["storeID"]
  );
    echo "<h2>Employee Created. Redirecting back to your homepage page.</h2>";
      echo "<script>setTimeout(\"location.href = 'homepageManager.php?managerID=$manager_ID';\",3000);</script>";



?>
