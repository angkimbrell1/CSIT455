<div class="menu">
<div class="container-fluid">
<div class="navbar-header">
<?php

echo "
  <a href=homepage.php?employeeID=$_GET[employeeID]>Home</a>
  <a href=availableShifts.php?employeeID=$_GET[employeeID]>Sub Shifts</a>";
?>
</div>
<div>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="#" ><span class="glyphicon glyphicon-user"></span> Account</a></li>
  </ul>
</div>
</div>
</div>
