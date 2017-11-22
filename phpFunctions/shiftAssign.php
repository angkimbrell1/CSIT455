<?php
  $shiftID = $_GET["shiftID"];
  $employeeID = $_POST["employeeID"];
  include "db.php";
  DB::updateShiftAvailablility($shiftID);
  DB::shiftAssign($shiftID,$employeeID);
 ?>
