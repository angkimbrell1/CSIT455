<?php
  include "db.php";
  $employeeID = $_POST["employeeID"];
  DB::deleteEmployee($employeeID);
  header("location: homepageManager.php?managerID=$_POST['managerID']");
 ?>
