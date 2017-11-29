<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="finalCSS.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Subbook</title>
  </head>
  <body>
    <?php include "header.php"; ?>
    <div id="availableShifts">
    <h2>Here are all shifts available for pick up</h2>
    <table id="avail">
    <?php
    include "db.php";
    $employee = DB::GetEmployeeById($_GET["employeeID"]);
    $availableShifts = DB::GetAvailableShiftsByStoreID($employee["storeID"]);
    echo "<tr>
          <th>Shift ID</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Date</th>
          <th>Position</th>
          <th>Pick up Shift</th>";
    foreach ($availableShifts as $shift) {
      echo "
          <tr>
              <td>$shift[shiftID]</td>
              <td>$shift[startTime]</td>
              <td>$shift[endTime]</td>
              <td width=100px>$shift[date]</td>
              <td>$shift[position]</td>
              <td><button><a href='takeAShift.php?employeeID=$employee[employeeID]&shiftID=$shift[shiftID]'>Pick up shift</button><td>
          </tr>";
    }
    ?>
  </table>
</div>

  </body>
</html>
