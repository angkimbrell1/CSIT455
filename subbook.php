<?php
  include "db.php";
  $employeeID = $_GET["employeeID"];
  $shiftID = $_GET["shiftID"];

  DB::putShiftInSubbook($shiftID);
  echo "<h2>Shift added to subbook. It will remain in your shift list until someone picks it up</h2><br>
  <h3 style=color:red>If no one else picks it up, it is still your shift and you must either show up or call off for the scheduled time.</h3>";
    echo "<script>setTimeout(\"location.href = 'homepage.php?employeeID=$employeeID';\",5000);</script>";

 ?>
