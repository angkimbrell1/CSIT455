<div class="menu">
<div class="container-fluid">
<div class="navbar-header">
<?php
if(isset($_GET['employeeID']))
{
  echo "
    <a href=homepage.php?employeeID=$_GET[employeeID]>Home</a>
    <a href=availableShifts.php?employeeID=$_GET[employeeID]>Sub Shifts</a>";
}
if(isset($_GET['managerID']))
{
  echo "
    <a href=homepageManager.php?managerID=$_GET[managerID]>Home</a>
    <a href=employees.php?managerID=$_GET[managerID]>List of Employees</a>";
}

?>
</div>
<div>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="#" ><span class="glyphicon glyphicon-user"></span> Account</a></li>
  </ul>
</div>
</div>
</div>
