<?php
  include "db.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="finalCSS.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="formFunctions.js" charset="utf-8"></script>
    <title>Welcome Managers!</title>
  </head>
  <body>
    <?php include "navbar.php";
    $managerID = $_GET["managerID"];
    $manager = DB::GetManagerById($managerID);

    ?>
    <h2 id="welcome">Welcome <?php echo "$manager[firstName] $manager[lastName]" ?></h2>
    <div id="availableShifts">
    <h3>Here are shifts that you need to schedule:</h3>
    <table style="width:150%" id="avail">
    <?php
    $availableShifts = DB::GetAvailableShiftsByStoreID($manager["storeID"]);
    echo "<tr>
          <th>Shift ID</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Date</th>
          <th>Position</th>
          <th>Assign Shift</th></tr>";
    foreach ($availableShifts as $shift) {
      echo "
          <tr>
              <td>$shift[shiftID]</td>
              <td>$shift[startTime]</td>
              <td>$shift[endTime]</td>
              <td width=100px>$shift[date]</td>
              <td>$shift[position]</td>
              <td><form method=post action='shiftAssign.php?shiftID=$shift[shiftID]'>
              <input style=width:100px type=text name=employeeID placeholder='Employee ID'>
              <input type=submit name=submit placeholder='Submit'>
              </form></td>
          </tr>";
    }
    ?>

  </table>
</div>
<div id="console">
  <h3>Employee options</h3>
  <h4>New hire?</h4>
  <button onclick="addEmployeeForm()">Add employee</button>
  <div id="addEmployee" style="visibility:hidden; overflow:none; height:0px; width: 0px;">
    <form class="" action="addEmployee.php" method="post">
      <input type="text" name="employeeID" placeholder="employeeID"><br>
      <input type="text" name="firstName" placeholder="First Name"><br>
      <input type="text" name="lastName" placeholder="Last Name"><br>
      <input type="text" name="position" placeholder="Position"><br>
      <input type="text" name="storeID" placeholder="Store ID"><br>
        <input type="hidden" name="managerID" value="<?php echo $_GET["managerID"]?>">
      <input type="submit" name="submit" placeholder="submit">
    </form>
  </div>
  <h4>Employee transfer?</h4>
  <button onclick="myFunction()">Update employee info</button>
  <div id="updateEmployee" style="visibility:hidden; overflow:none; height:0px; width: 0px;">
    <form class="" action="updateEmployee.php" method="post">
      <input type="text" name="employeeID" placeholder="employeeID"><br>
      <input type="text" name="storeID" placeholder="New Store ID"><br>
        <input type="hidden" name="managerID" value="<?php echo $_GET["managerID"]?>">
      <input type="submit" name="submit" placeholder="submit">
    </form>
  </div>
  <h4>Terminations/Retire/Move on</h4>
  <button onclick="deleteEmployee()">Delete employee</button>
  <div id="deleteEmployee" style="visibility:hidden; overflow:none; height:0px; width: 0px;">
    <form class="" action="deleteEmployee.php" method="post">
      <input type="text" name="employeeID" placeholder="employee ID"><br>
        <input type="hidden" name="managerID" value="<?php echo $_GET["managerID"]?>">
      <input type="submit" name="submit" placeholder="submit">
    </form>
  </div>
</div>

  </body>
</html>
