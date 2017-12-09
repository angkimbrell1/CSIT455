<?php
  include "db.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="finalCSS.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="formFunctions.js" charset="utf-8"></script>
    <title>Employees List</title>
  </head>
  <body>
    <?php include "navbar.php"; ?>
    <div id="availableShifts">
    <h2>Here are all of the employees at your store!</h2>
    <table id="avail">
    <?php
    $manager = DB::GetManagerById($_GET['managerID']);
    $employees = DB::getEmployeesByManagerStoreID($manager['storeID']);
    echo "<tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Normal Position</th>
          <th>EmployeeID</th>";
    foreach ($employees as $employee) {
      echo "
          <tr>
              <td>$employee[firstName]</td>
              <td>$employee[lastName]</td>
              <td>$employee[position]</td>
              <td>$employee[employeeID]</td>
          </tr>";
    }
    ?>
  </table>
</div>

  </body>
</html>
