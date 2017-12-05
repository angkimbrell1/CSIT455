<?php
include "db.php";
  $employeeID = $_GET["employeeID"];
  $employee = DB::GetEmployeeById($employeeID);
 ?>
 <?php
$page = "Home";

  require "header.php";
  require "session.php";

  if(isset($_SESSION['userID'])) {
    $accountLink = "logout.php";
    $activeLink = "Log Out";
  } else {
    $accountLink = "login.php";
    $activeLink = "Log In";
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="finalCSS.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <?php include "navbar.php"?>

<h2 id="welcome">Welcome <?php echo "$employee[firstName] $employee[lastName]" ?></h2>
<h4 id="welcomeStatement">Here are your current scheduled shifts</h4>

<div id="heading">
<table id="avail">
<?php
$employeeID = $_GET["employeeID"];
$employeeShifts = DB::getEmployeeShifts();
echo "<tr>
      <th>Shift ID</th>
      <th>Start Time</th>
      <th>End Time</th>
      <th>Date</th>
      <th>Position</th>
      <th>Options</th></tr>";
foreach ($employeeShifts as $shift) {
  echo "
      <tr>
          <td>$shift[shiftID]</td>
          <td>$shift[startTime]</td>
          <td>$shift[endTime]</td>
          <td style=width:100px>$shift[date]</td>
          <td>$shift[position]</td>
          <td id=buttonTD style=width:200px><button><a href=subbook.php?shiftID=$shift[shiftID]&employeeID=$employeeID>Put shift in sub book</a></button></td>
      </tr>";
}

 ?>
</table>
</div>

  </body>
</html>
