<?php
$employeeID = $_GET["employeeID"];
$shiftID = $_GET["shiftID"];

include "db.php";
DB::pickUpShift($employeeID,$shiftID);
DB::updateShiftAvailablility($shiftID);

echo "<h2>Shift granted! Redirecting you....";
  echo "<script>setTimeout(\"location.href = 'homepage.php?employeeID=$employeeID';\",3000);</script>";



 ?>
