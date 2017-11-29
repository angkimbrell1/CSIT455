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

<body>
    <!-- Header TODO: MAKE THIS A PHP FILE -->
<div class="menu">
  <div class="container-fluid">
		<div class="navbar-header">
			<a href="#">Home</a>
      <a href="#">Sub Shifts</a>
		</div>
		<div class="nav navbar-nav navbar-right">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="login.php" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Account</a>
          <ul class="dropdown-menu">
            <li>
              <a href="<?php echo $accountLink?>"><?php echo $activeLink ?></a>
            </li>
          </ul>
        </li>
      </ul>
		</div>
	</div>
</div>

<!-- WELCOME THE USER
TODO: Make this a php statement -->
<p id="welcome">Welcome EMPLOYEE</p>
<p id="welcomeStatement">Here are your shifts</p>

<!-- LIST -->
  <div class="heading">
  <div class="col-md-2" id="heading">Date</div>
  <div class="col-md-2" id="heading">Time</div>
  <div class="col-md-2"id="heading">Shift Type</div>
  <div class="col-md-2"id="heading">Manager</div>
  <div class="col-md-2"id="heading">Options</div>
  
  <!--test of db connection and retrieval-->
  <div class="panel">
    <?php 
      require "db.php";
      $test = DB::Test(); ?>
    <ul>
      <?php foreach ($test as $name) { ?>
      <li><?php echo $name['employeeID'] . " " . $name['position'] ?></li>
      <?php } ?>
    </ul>
  </div>
  <!--End test-->
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
